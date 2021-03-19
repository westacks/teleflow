<?php

namespace App\Services\Installer;

use MadWeb\Initializer\Contracts\Runner;

class Update
{
    public function production(Runner $run)
    {
        $run->artisan('down', ['--retry' => 60])
            ->external('composer', 'install', '--no-dev', '--prefer-dist', '--optimize-autoloader')
            ->artisan('migrate', ['--force' => true])
            ->artisan('cache:clear')
            ->artisan('optimize')
            ->external('npm', 'install')
            ->external('npm', 'run', 'production')
            ->external('rm', '-rf', 'node_modules')
            ->artisan('up');
    }

    public function local(Runner $run)
    {
        $run->artisan('down', ['--retry' => 60])
            ->external('composer', 'install')
            ->artisan('migrate')
            ->artisan('cache:clear')
            ->external('npm', 'install')
            ->external('npm', 'run', 'development')
            ->artisan('up');
    }
}
