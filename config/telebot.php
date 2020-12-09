<?php

use App\Services\Telegram\Commands\StartCommand;

return [

    'default' => env('TELEGRAM_BOT_NAME'),

    'bots' => [
        env('TELEGRAM_BOT_NAME') => [
            'token' => env('TELEGRAM_BOT_TOKEN'),
            'handlers' => [
                StartCommand::class
            ]
        ]
    ]
];
