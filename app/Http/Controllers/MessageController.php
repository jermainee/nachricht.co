<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;

class MessageController extends Controller
{
	private const OPEN_TIMEOUT_IN_SECONDS = 300; // 5 minutes

	public const ALLOWED_REFERERS = [
		'https://nachricht.co/',
		'https://nachricht.co.test/',
	];

	public function create(Request $request): JsonResponse
	{
		$referer = $request->headers->get('referer');
		if (!$referer || !in_array($referer, self::ALLOWED_REFERERS)) {
			return Response::json([
				'success' => false,
				'error' => 'access denied',
			]);
		}

		$encryptionKey = $this->generateId(16);
		$iv = $this->generateIv();

		$dateTime = new \DateTime();
		$message = new Message();
		$message->uid = $this->generateId(16);
		$message->message = base64_encode(
			$this->encryptMessage(
				htmlspecialchars($request->input('message')),
				$encryptionKey,
				$iv
			)
		);
		$message->password = !empty($request->input('password')) ? Hash::make($request->input('password')) : null;
		$message->iv = base64_encode($iv);
		$message->created_at = $dateTime;
		$message->updated_at = $dateTime;
		$message->save();

		$link = 'https://nachricht.co/' . $message->uid . '_' . $encryptionKey;

		return Response::json([
			'success' => true,
			'link' => $link,
			'shareUrls' => (object) [
				'whatsApp' => 'https://wa.me/?text=' . $link,
				'telegram' => 'https://telegram.me/share/url?url=' . $link,
			]
		]);
    }

	public function open(string $uid, string $key)
	{
		$this->noCacheHeaders();
		session([
			'uid' => $uid,
			'key' => $key,
			'open_timestamp' => time(),
		]);

		/** @var Message|null $message */
		$message = Message::where('uid', $uid)->first();
		if ($message === null) {
			return Response::redirectTo('/');
		}

		return view('frontPage.open', [
			'hasPassword' => !empty($message->password)
		]);
    }

	public function read(Request $request)
	{
		$this->noCacheHeaders();
		$uid = session('uid');
		$key = session('key');
		$openTimestamp = session('open_timestamp');

		if (empty($uid) || empty($key) || empty($openTimestamp)) {
			return Response::redirectTo('/');
		}

		if ((time() - $openTimestamp) > self::OPEN_TIMEOUT_IN_SECONDS) {
			return Response::redirectTo('/');
		}

		session([
			'uid' => null,
			'key' => null,
			'open_timestamp' => null,
		]);

		/** @var Message|null $message */
		$message = Message::where('uid', $uid)->first();
		if ($message === null) {
			return Response::redirectTo('/');
		}

		if (!empty($message->password)) {
			if (!$request->isMethod('post') || empty($request->input('password'))) {
				return Response::redirectTo('/' . $uid . '_' . $key);
			}

			if (!Hash::check($request->input('password'), $message->password)) {
				// TODO: Implement anti brute force

				return Response::redirectTo('/' . $uid . '_' . $key);
			}
		}

		$decodedMassage = base64_decode($message->message);
		$decryptedMessage = $this->decryptMessage($decodedMassage, $key, base64_decode($message->iv));

		$dateTime = new \DateTime();
		$message->update([
			'uid' => null,
			'message' => '',
			'password' => '',
			'iv' => '',
			'deleted_at' => $dateTime,
			'updated_at' => $dateTime
		]);

		return view('frontPage.read', [
			'message' => $this->renderHyperlinks($decryptedMessage)
		]);
	}

	private function generateId(int $length): string
	{
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';

		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}

		return $randomString;
	}

	private function encryptMessage(string $plaintext, string $key, string $iv, $cipher = 'aes256'): string
	{
		$ciphertext = openssl_encrypt($plaintext, $cipher, $key, $options=0, $iv);

		return $ciphertext;
	}

	private function decryptMessage(string $encrypted, string $key, string $iv, $cipher = 'aes256'): string
	{
		return openssl_decrypt($encrypted, $cipher, $key, $options=0, $iv);
	}

	private function generateIv($cipher = 'aes256'): string
	{
		$ivlen = openssl_cipher_iv_length($cipher);

		return openssl_random_pseudo_bytes($ivlen);
	}

	private function renderHyperlinks(string $message): string
	{
		$url = '@(http(s)?)?(://)?(([a-zA-Z])([-\w]+\.)+([^\s\.]+[^\s]*)+[^,.\s])@';
		$message = preg_replace($url, '<a href="http$2://$4" target="_blank" rel="noopener nofollow" title="$0">$0</a>', $message);

		return $message;
	}

	private function noCacheHeaders(): void
	{
		header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
		header("Cache-Control: post-check=0, pre-check=0", false);
		header("Pragma: no-cache");
	}
}
