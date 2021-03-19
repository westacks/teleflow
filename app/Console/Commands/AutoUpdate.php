<?php

namespace App\Console\Commands;

use Codedge\Updater\UpdaterManager;
use Illuminate\Console\Command;
use Codedge\Updater\SourceRepository;
use Illuminate\Support\Facades\Artisan;
use Symfony\Component\Console\Output\ConsoleOutput;

class AutoUpdate extends Command
{
    protected $signature = 'updater:autoupdate';
    protected $description = 'Command to check for new app updates and run update if available';

    public function handle(UpdaterManager $updater)
    {
        $output = new ConsoleOutput();
        /** @var SourceRepository $repository */
        $repository = $updater->source();

        if (!$repository->isNewVersionAvailable()) {
            return $this->info('Your application is already up to date!');
        }

        $current = $repository->getVersionInstalled();
        $available = $repository->getVersionAvailable();

        $this->info("Starting application update: $current => $available");

        $this->info("Drafting latest release...");
        $release = $repository->fetch($available);

        $this->info("Preparing for update...");
        Artisan::call('down', ['--retry' => 60], $output);

        $this->info("Updating application files...");
        $repository->update($release);

        Artisan::call('app:update', [], $output);
    }
}
