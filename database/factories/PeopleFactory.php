<?php

namespace Database\Factories;

use App\Models\People;
use Illuminate\Database\Eloquent\Factories\Factory;

class PeopleFactory extends Factory
{
    protected $model = People::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'age' => $this->faker->numberBetween(18, 30),
            'status' => $this->faker->randomElement(['user', 'admin']),
            'notice' => $this->faker->sentence,  // Optional: a random notice message
        ];
    }
}
