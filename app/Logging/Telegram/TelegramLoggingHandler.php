<?php

namespace App\Logging\Telegram;

use App\Services\Telegram\TelegramBotAPI;
use Monolog\Handler\AbstractProcessingHandler;
use Monolog\Logger;

class TelegramLoggingHandler extends AbstractProcessingHandler
{

    protected int $chatId;

    protected string $token;

    public function __construct(array $config)
    {
        $level = Logger::toMonologLevel($config['level']);
        parent::__construct($level);

        $this->chatId = $config['chat_id'];
        $this->token = $config['token'];
    }

    public function write(array $record): void
    {
        TelegramBotAPI::sendMessage(
            $this->token,
            $this->chatId,
            $record['formatted']
        );
    }
}
