<?php

use App\Services\Telegram\Commands\StartCommand;

return [

    'default' => 'teleflow_test_bot',

    'bots' => [
        'teleflow_test_bot' => [
            'token' => env('TELEGRAM_BOT_TOKEN'),
            'handlers' => [
                StartCommand::class
            ]
        ]
    ]
];
