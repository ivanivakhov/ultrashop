<?php

namespace App\Logging\Telegram;

use App\Logging\Telegram\TelegramLoggingHandler;
use Monolog\Logger;

class TelegramLoggerFactory
{

    /**
     * Create a custom Monolog instance.
     */
    public function __invoke(array $config): Logger
    {
        $logger = new Logger('telegram');

        $logger->pushHandler(new TelegramLoggingHandler($config));

        return $logger;
    }
}
