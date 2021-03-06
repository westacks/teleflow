<?php

namespace App\Services\Telegram\Commands;

class StartCommand extends CommandHandler
{
    protected static $aliases = [ '/start' ];
    protected static $description = 'Send "/start" to get "Hello, World!"';

    public function handle()
    {
        $this->sendMessage([
            'text' => 'Hello, World!'
        ]);
    }
}
