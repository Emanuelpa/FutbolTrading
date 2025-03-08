<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TradeItemFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->words(3, true),
            'type' => $this->faker->randomElement(['Card', 'Clothes', 'Exclusive', 'Signed Item', 'Virtual Item']),
            'offerType' => $this->faker->randomElement(['To trade', 'To sell', 'Open to offers']),
            'offerDescription' => $this->faker->paragraph,
            'image' => fake()->imageUrl(200, 200, 'sports'),
            'user' => User::inRandomOrder()->first()->id,
        ];
    }
}
