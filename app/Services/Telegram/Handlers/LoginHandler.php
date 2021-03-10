<?php

namespace App\Services\Telegram\Handlers;

use App\Models\User;
use WeStacks\TeleBot\Objects\Update;
use WeStacks\TeleBot\TeleBot;

/**
 * This handler stores Telegram and app user instances to retrive them later from singleton anywhere.
 *
 * @package App\Services\Telegram\Handlers
 */
class LoginHandler extends UpdateHandler
{
    public static function trigger(Update $update, TeleBot $bot)
    {
        return true;
    }

    public function handle()
    {
        $telegram = $this->update->user();
        $user = User::find($telegram->id);
        $this->auth->store($telegram, $user);
    }
}
