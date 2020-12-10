<?php

use App\Services\Telegram\Commands\StartCommand;

return [

    'default' => 'bot',

    'bots' => [
        'bot' => [
            'token' => env('TELEGRAM_BOT_TOKEN'),
            'name' => env('TELEGRAM_BOT_NAME'),
            'handlers' => [
                StartCommand::class
            ]
        ]
    ]
];
