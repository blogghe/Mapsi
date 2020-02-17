<?php

namespace App\Console\Commands;

use App\Service;
use Illuminate\Console\Command;

class AddServiceCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'service:info';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Adds a new Service';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $service = Service::create( [
            'name'  => 'Groendienst RSL',
            'email' => 'groendienst@rsl.be',
        ] );
        $this->info('Added: ' . $service->name);
        $this->warn('this is a warning');
        $this->error('this is a warning string');
    }
}
