<?php

namespace App\Services\Telegram\Auth;

use App\Models\User;
use App\Services\Singleton;
use WeStacks\TeleBot\Objects\User as TgUser;

/**
 * User storage for bot auth
 *
 * @package App\Services\Telegram\Auth
 */
class BotUser extends Singleton
{
    /**
     * @var App\Models\User|null
     */
    protected $user = null;

    /**
     * @var WeStacks\TeleBot\Objects\User|null
     */
    protected $telegram = null;

    /**
     * Store user instances
     *
     * @param TgUser $telegram
     * @param User $user
     * @return void
     */
    public function store(TgUser $telegram = null, User $user = null)
    {
        $this->telegram = $telegram;
        $this->user = $user;
    }

    /**
     * Unload user instances
     *
     * @return void
     */
    public function empty()
    {
        $this->telegram = null;
        $this->user = null;
    }

    /**
     * Get Telegram user instance
     *
     * @return WeStacks\TeleBot\Objects\User|null
     */
    public function telegram()
    {
        return $this->telegram;
    }

    /**
     * Get app user instance
     *
     * @return App\Models\User|null
     */
    public function user()
    {
        return $this->user;
    }
}
