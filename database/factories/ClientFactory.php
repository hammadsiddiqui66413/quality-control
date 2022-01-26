<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            // 'first_name' => $this->faker->name(),
            // 'last_name' => $this->faker->word(),
            // 'email' => $this->faker->unique()->safeEmail(),
            // 'password' => Hash::make('123123123'), // password
            // 'remember_token' => Str::random(10),
        ];
    }
}
