<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class PreUpdateTasks extends Command
{
    protected $signature = 'updater:prepare';
    protected $description = 'Prepare application for update';

    public function handle()
    {
        Artisan::call('down', [ '--retry' => 60 ]);
    }
}
