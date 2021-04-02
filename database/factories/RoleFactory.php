<?php

namespace Database\Factories;

use App\Model;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoleFactory extends Factory
{
    protected $model = Model::class;

    public function definition(): array
    {
    	return [
            'role' => $faker->name,
            'created_at' => now(),
            'updated_at' => now(),
    	];
    }
}
