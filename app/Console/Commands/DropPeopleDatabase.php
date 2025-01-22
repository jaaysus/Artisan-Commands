<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class DropPeopleDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'people:drop';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Drop the "people" database';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        try {
            $databaseExists = DB::select("SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = 'people'");

            if (empty($databaseExists)) {
                $this->info('People are already dropped');
                return;
            }

            DB::statement('DROP DATABASE IF EXISTS people');
            $this->info('Database "people" has been dropped successfully.');
        } catch (\Exception $e) {
            $this->error('Error dropping the database: ' . $e->getMessage());
        }
    }
}
