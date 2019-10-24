<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;

class MessageController extends Controller
{
	private $apiKey = "CU2kTHMm7RXkeWs4KLCzhiTeYYmWU";

	public function create(Request $request): JsonResponse
	{
		$dateTime = new \DateTime();
		$message = new Message();
		$message->id = $this->generateId();
		$message->message = $request->input('message');
		$message->password = Hash::make($request->input('message'));
		$message->created_at = $dateTime;
		$message->updated_at = $dateTime;
		$message->save();

		return Response::json([
			'success' => true,
			'messageId' => $message->id
		]);
    }

	public function read(int $id): JsonResponse
	{
		return Response::json([
			'success' => true,
			'passwordRequired' => true,
			'message' => 'sdfsdfdsf'
		]);
	}

	private function generateId(): string
	{
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';

		for ($i = 0; $i < 16; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}

		return $randomString;
	}
}
