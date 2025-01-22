<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\People;

class CheckStatus extends Command
{
    protected $signature = 'people:status';
    protected $description = 'Check the status of a person and allow status change';

    public function handle()
    {
        $people = People::all();

        if ($people->isEmpty()) {
            $this->error('No people found in the database.');
            return;
        }

        $peopleList = $people->map(function ($person, $key) {
            return ($key + 1) . '. ' . $person->name;
        })->toArray();
        

        $choice = $this->choice('Select a person by number:', $peopleList);

        $index = explode('.', $choice)[0] - 1;
        $person = $people[$index];

        $status = $person->status;
        $this->info("Current status of {$person->name}: {$status}");

        if ($status === 'user') {
            $confirm = $this->confirm('Would you like to promote to admin?', false);
            if ($confirm) {
                $person->status = 'admin';
                $person->save();
                $this->info("{$person->name} has been promoted to admin.");
            } else {
                $this->info("No changes made for {$person->name}.");
            }
        } elseif ($status === 'admin') {
            $confirm = $this->confirm('Would you like to revoke access?', false);
            if ($confirm) {
                $person->status = 'user';
                $person->save();
                $this->info("{$person->name}'s admin access has been revoked.");
            } else {
                $this->info("No changes made for {$person->name}.");
            }
        } else {
            $this->error("The status of {$person->name} is unknown.");
        }
    }
}
