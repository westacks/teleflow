<?php

namespace App\Services\Installer;

use MadWeb\Initializer\Contracts\Runner;

class Install
{
    public function production(Runner $run)
    {
        $run->external('composer', 'install', '--no-dev', '--prefer-dist', '--optimize-autoloader')
            ->artisan('key:generate')
            ->artisan('migrate', ['--force' => true])
            ->artisan('storage:link')
            ->artisan('optimize')
            ->external('npm', 'install')
            ->external('npm', 'run', 'production')
            ->external('rm', '-rf', 'node_modules');
    }

    public function local(Runner $run)
    {
        $run->external('composer', 'install')
            ->artisan('key:generate')
            ->artisan('migrate')
            ->artisan('storage:link')
            ->external('npm', 'install')
            ->external('npm', 'run', 'development');
    }
}
