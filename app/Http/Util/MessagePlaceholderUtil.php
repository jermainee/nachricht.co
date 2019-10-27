<?php

namespace App\Http\Util;

class MessagePlaceholderUtil {

	private const MESSAGE_PLACEHOLDERS = [
		'de' => [
			'Hi James! Ich wollte dich nur kurz fragen ob du ...',
			'Sag mal, wie bekomme ich am besten ...',
			'Hey! Kannst du mir erklären wie ...',
			'Wer war eigentlich der Typ von dem du ...',
			'Hier, meine Adresse ist ...'
		],
		'en' => [
			'Hi James! I just wanted to ask you if you ...',
			'Say, what\'s the best way to get ...',
			'Hey! Can you explain to me how ...',
			'Who was this guy that you were ...',
			'Here, my address is ...'
		],
	];
}