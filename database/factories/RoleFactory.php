<?php

namespace Database\Factories;

use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoleFactory extends Factory
{
    protected $model = Role::class;

    public function definition(): array
    {
    	return [
            'role' => $this->faker->name,
            // 'created_at' => now(),
            // 'updated_at' => now(),
    	];
    }
}
