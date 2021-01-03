<?php

namespace App\Console\Commands;

use danog\MadelineProto\API;
use Illuminate\Console\Command;

class MTProtoSetup extends Command
{
    protected $signature = 'mtproto:setup';
    protected $description = 'Setup MTProto session to connect to Telegram API';

    public function handle()
    {
        $this->line('Connecting using MTProto protocol...');
        $client = new API('session.madeline', config('mtproto'));
        $client->async(true);

        $client->loop(function () use ($client) {
            $this->line('Checking authorisation...');
            $auth = yield $client->getSelf();
            if ($auth) return;

            $this->line('Logining in '.config('mtproto.app_info.user_phone').' user...');
            yield $client->phoneLogin(config('mtproto.app_info.user_phone'));
            yield $client->completePhoneLogin(yield $client->readline('Enter the verification code: '));
        });

        $this->info('Successfully loged in!');
    }
}
