<?php

namespace App\Services\Telegram\Commands;

use App\Services\Telegram\Auth\BotUser;
use WeStacks\TeleBot\Handlers\CommandHandler as BaseCommandHandler;
use WeStacks\TeleBot\Objects\Update;
use WeStacks\TeleBot\TeleBot;

abstract class CommandHandler extends BaseCommandHandler
{
    protected $auth = null;

    public function __construct(TeleBot $bot, Update $update)
    {
        parent::__construct($bot, $update);
        $this->auth = BotUser::getInstance();
    }
}
