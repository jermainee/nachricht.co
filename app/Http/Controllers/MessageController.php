<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;

class MessageController extends Controller
{
	private const ALLOWED_REFERERS = [
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
		$message->message = base64_encode($this->encryptMessage($request->input('message'), $encryptionKey, $iv));
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

	public function read()
	{
		$uid = session('uid');
		$key = session('key');
		if (empty($uid) || empty($key)) {
			return Response::redirectTo('/');
		}

		session([
			'uid' => null,
			'key' => null,
		]);

		/** @var Message|null $message */
		$message = Message::where('uid', $uid)->first();
		if ($message === null) {
			return Response::redirectTo('/');
		}

		$decodedMassage = base64_decode($message->message);
		$decryptedMessage = $this->decryptMessage($decodedMassage, $key, base64_decode($message->iv));

		$dateTime = new \DateTime();
		$message->update([
			'uid' => null,
			'message' => '',
			'password' => '',
			'deleted_at' => $dateTime,
			'updated_at' => $dateTime
		]);

		return view('frontPage.read', [
			'message' => $decryptedMessage
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
}
