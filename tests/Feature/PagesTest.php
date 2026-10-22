<?php

namespace Tests\Feature;

use Tests\TestCase;

class PagesTest extends TestCase
{
    public function testFrontPageUsesGermanByDefault()
    {
        $this->get('/')
            ->assertOk()
            ->assertSee('<html class="has-navbar-fixed-top" lang="de">', false)
            ->assertSee('<title>Nachricht.co - Die verschlüsselte Einweg-Nachricht</title>', false)
            ->assertSee('<link rel="canonical" href="https://nachricht.co/" />', false);
    }

    public function testLocalizedFrontPages()
    {
        $this->get('/en')
            ->assertOk()
            ->assertSessionHas('locale', 'en')
            ->assertSee('<title>Nachricht.co - The encrypted one-time message</title>', false)
            ->assertSee('<link rel="canonical" href="https://nachricht.co/en" />', false);

        $this->get('/nl')->assertOk()->assertSessionHas('locale', 'nl');
        $this->get('/ru')->assertOk()->assertSessionHas('locale', 'ru');
    }

    public function testGermanFrontPageRedirectsPermanently()
    {
        $this->get('/de')
            ->assertStatus(301)
            ->assertRedirect('/')
            ->assertSessionHas('locale', 'de');
    }

    public function testLanguageCanBeSwitched()
    {
        $this->get('/lang/en')
            ->assertRedirect()
            ->assertSessionHas('locale', 'en');

        $this->get('/')
            ->assertOk()
            ->assertSee('<html class="has-navbar-fixed-top" lang="en">', false);
    }

    public function testStaticPagesAreReachable()
    {
        foreach (['/faq', '/faq/aes', '/faq/tls', '/datenschutz', '/impressum'] as $uri) {
            $this->get($uri)->assertOk();
        }
    }

    public function testLegacyUrlsRedirectPermanently()
    {
        $this->get('/aes')->assertStatus(301)->assertRedirect('/faq/aes');
        $this->get('/tls')->assertStatus(301)->assertRedirect('/faq/tls');
    }
}
