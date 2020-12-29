<?php

namespace App\Services\Telegram\Handlers;

use App\Services\Telegram\Auth\BotUser;
use WeStacks\TeleBot\Interfaces\UpdateHandler as BaseUpdateHandler;
use WeStacks\TeleBot\Objects\Update;
use WeStacks\TeleBot\TeleBot;

abstract class UpdateHandler extends BaseUpdateHandler
{
    protected $auth = null;

    public function __construct(TeleBot $bot, Update $update)
    {
        parent::__construct($bot, $update);
        $this->auth = BotUser::getInstance();
    }
}
