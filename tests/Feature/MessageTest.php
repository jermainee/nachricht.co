<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class MessageTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        DB::table('message_count')->insert(['message_count' => 0]);
    }

    public function testMessageCanBeCreated()
    {
        $response = $this->post('/api/message/create.json', [
            'message' => 'Hello world',
            'deletion' => '12',
        ]);

        $response->assertOk()->assertJson(['success' => true]);

        $link = $response->json('link');
        $this->assertSame(1, preg_match('~^https://nachricht\.co/([0-9a-zA-Z]{16})_([0-9a-zA-Z]{16})$~', $link, $matches));
        $this->assertSame('https://wa.me/?text=' . $link, $response->json('shareUrls.whatsApp'));
        $this->assertSame('https://telegram.me/share/url?url=' . $link, $response->json('shareUrls.telegram'));

        $message = DB::table('messages')->where('uid', $matches[1])->first();
        $this->assertNotNull($message);
        $this->assertNotSame('Hello world', $message->message);
        $this->assertNull($message->password);
        $this->assertEquals(12, $message->delete_after_hours);
        $this->assertEquals(0, $message->delete_after_read);

        $this->assertEquals(1, DB::table('message_count')->value('message_count'));
    }

    public function testCreateEndpointIsRateLimited()
    {
        $this->post('/api/message/create.json', ['message' => 'Hello world'])
            ->assertOk()
            ->assertHeader('X-RateLimit-Limit', 60);
    }

    public function testMessageIsDestroyedAfterReading()
    {
        [$uid, $key] = $this->createMessage(['message' => 'Top secret', 'deleteAfterRead' => 'on']);

        $this->get("/{$uid}_{$key}")
            ->assertOk()
            ->assertSee(trans('frontpage.openText'))
            ->assertDontSee(trans('frontpage.openPasswordPlaceholder'));

        $this->get('/n')
            ->assertOk()
            ->assertSee('Top secret');

        $this->assertDatabaseMissing('messages', ['uid' => $uid]);
        $this->get("/{$uid}_{$key}")->assertRedirect('/');
    }

    public function testMessageIsKeptWhenNotDeletedAfterReading()
    {
        [$uid, $key] = $this->createMessage(['message' => 'Read me twice']);

        $this->get("/{$uid}_{$key}");
        $this->get('/n')->assertOk()->assertSee('Read me twice');

        $this->get("/{$uid}_{$key}");
        $this->get('/n')->assertOk()->assertSee('Read me twice');
    }

    public function testPasswordProtectedMessageRequiresCorrectPassword()
    {
        [$uid, $key] = $this->createMessage(['message' => 'Psst', 'password' => 'secret', 'deleteAfterRead' => 'on']);

        $this->get("/{$uid}_{$key}")
            ->assertOk()
            ->assertSee(trans('frontpage.openPasswordPlaceholder'));
        $this->get('/n')->assertRedirect("/{$uid}_{$key}");

        $this->get("/{$uid}_{$key}");
        $this->post('/n', ['password' => 'wrong'])->assertRedirect("/{$uid}_{$key}");

        $this->get("/{$uid}_{$key}");
        $this->post('/n', ['password' => 'secret'])
            ->assertOk()
            ->assertSee('Psst');

        $this->assertDatabaseMissing('messages', ['uid' => $uid]);
    }

    public function testLinksInMessagesAreRendered()
    {
        [$uid, $key] = $this->createMessage(['message' => 'Visit https://example.com now']);

        $this->get("/{$uid}_{$key}");
        $this->get('/n')
            ->assertOk()
            ->assertSee('<a href="https://example.com" target="_blank" rel="noopener nofollow" title="https://example.com">https://example.com</a>', false);
    }

    public function testMessageHtmlIsEscaped()
    {
        [$uid, $key] = $this->createMessage(['message' => '<script>alert(1)</script>']);

        $this->get("/{$uid}_{$key}");
        $this->get('/n')
            ->assertOk()
            ->assertSee('&lt;script&gt;alert(1)&lt;/script&gt;', false)
            ->assertDontSee('<script>alert(1)</script>', false);
    }

    public function testUnknownMessageRedirectsToFrontPage()
    {
        $this->get('/aaaaaaaaaaaaaaaa_bbbbbbbbbbbbbbbb')->assertRedirect('/');
    }

    public function testReadingWithoutOpeningRedirectsToFrontPage()
    {
        $this->get('/n')->assertRedirect('/');
    }

    public function testReadingAfterOpenTimeoutRedirectsToFrontPage()
    {
        [$uid, $key] = $this->createMessage(['message' => 'Too late']);

        $this->withSession(['uid' => $uid, 'key' => $key, 'open_timestamp' => time() - 301])
            ->get('/n')
            ->assertRedirect('/');
    }

    public function testDeleteCommandIsRegistered()
    {
        $this->assertArrayHasKey('message:delete', Artisan::all());
    }

    private function createMessage(array $data): array
    {
        $link = $this->post('/api/message/create.json', $data)->json('link');

        return explode('_', basename($link), 2);
    }
}
