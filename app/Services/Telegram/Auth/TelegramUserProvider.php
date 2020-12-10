<?php

namespace App\Services\Telegram\Auth;

use App\Models\User;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\UserProvider;

class TelegramUserProvider implements UserProvider
{
    public function retrieveById($identifier)
    {
        return $this->findOrCreateUser($identifier);
    }

    public function retrieveByCredentials(array $credentials)
    {
        return $this->findOrCreateUser($credentials['id'], $credentials);
    }

    public function validateCredentials(Authenticatable $user, array $credentials)
    {
        // We always should validate telegram credentials before we search or create a new user
        // In the state when JWTGuard runs this function, we already know if credentials are invalid, so this is always will be true

        return true;
    }

    protected function findOrCreateUser($identifier, array $credentials = null)
    {
        if ($credentials) {
            if (!static::validCredentials($credentials)) {
                return abort(401, trans('auth.failed'));
            }

            $credentials = collect($credentials)
                ->only(['id', 'first_name', 'last_name', 'username', 'auth_date', 'photo_url'])
                ->toArray();

            // We can unguard User model only because we sure that credentials are valid
            User::unguard();
            $user = User::updateOrCreate(['id' => $identifier], $credentials);
            User::reguard();

            return $user;
        }

        return User::find($identifier);
    }

    /**
     * Function to validate Telegram Auth widget credentials
     */
    public static function validCredentials(array $credentials) : bool
    {
        $data_string = collect($credentials)->except('hash')->transform(function ($val, $key) {
            return "$key=$val";
        })->sort()->join("\n");

        $hash_key = hash('sha256', config('telebot.bots.bot.token'), true);
        $hash_hmac = hash_hmac('sha256', $data_string, $hash_key);

        return $credentials['hash'] === $hash_hmac;
    }



    public function retrieveByToken($identifier, $token) {}
    public function updateRememberToken(Authenticatable $user, $token) {}
}
