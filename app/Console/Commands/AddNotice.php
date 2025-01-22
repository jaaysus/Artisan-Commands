<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\People;

class AddNotice extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'people:notice';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add or update a notice for a person';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->ask('Enter the name');
        $notice = $this->ask('Enter the notice');

        // Find the person by their name
        $person = People::where('name', $name)->first();

        if ($person) {
            $person->notice = $notice;
            $person->save();
            $this->info("Notice updated for {$name}");
        } else {
            $this->error("Person not found");
        }
    }
}
