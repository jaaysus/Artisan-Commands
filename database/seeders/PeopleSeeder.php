<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\People;

class PeopleSeeder extends Seeder
{
    public function run()
    {
        People::factory(20)->create();
    }
}
