<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class PostUpdateCleanup extends Command
{
    protected $signature = 'updater:cleanup';
    protected $description = 'Finish application update';

    public function handle()
    {
        shell_exec('npm install && npm run prod && rm -f -r node_modules');
        Artisan::call('cache:clear');
        Artisan::call('migrate --force');
        Artisan::call('optimize');
        Artisan::call('up');
    }
}
