<?php

use danog\MadelineProto\Logger;

return [
    'app_info' => [
        'api_id' => env('TELEGRAM_API_ID'),
        'api_hash' => env('TELEGEAM_API_HASH'),
        'user_phone' => env('TELEGRAM_USER_PHONE')
    ],
    'logger' => [
        'logger' => Logger::FILE_LOGGER,
        'logger_param' => storage_path('logs/mtproto.log'),
        'logger_level' => Logger::ERROR
    ]
];
