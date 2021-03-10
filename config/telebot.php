<?php

use App\Services\Telegram\Commands\StartCommand;
use App\Services\Telegram\Handlers\LoginHandler;

return [
    'default' => 'bot',
    'bots' => [
        'bot' => [
            'token' => env('TELEGRAM_BOT_TOKEN'),
            'name' => env('TELEGRAM_BOT_NAME'),
            'handlers' => [
                // Login
                LoginHandler::class,
                // Command handlers
                StartCommand::class,
                // Other handlers
            ]
        ]
    ]
];
