<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    protected static ?string $password;

    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'emailVerifiedAt' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
            'role' => fake()->randomElement(['admin', 'user']),
            'budget' => fake()->randomFloat(2, 0, 500),
        ];
    }

    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'emailVerifiedAt' => null,
        ]);
    }
}
