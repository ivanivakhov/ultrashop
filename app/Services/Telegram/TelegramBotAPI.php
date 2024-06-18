<?php

namespace App\Services\Telegram;

use App\Services\Telegram\Exceptions\TelegramBotApiExceptionHandler;
use Illuminate\Support\Facades\Http;

class TelegramBotAPI
{

    public const HOST = 'https://api.telegram.org/bot';
    public static function sendMessage(string $token, int $chatId, string $text): void
    {
        try {
            Http::get(self::HOST . $token . '/sendMessage', [
                'chat_id' => $chatId,
                'text' => $text
            ]);
        } catch (TelegramBotApiExceptionHandler $e) {
            throw new TelegramBotApiExceptionHandler($e->getMessage());
        }
    }
}
