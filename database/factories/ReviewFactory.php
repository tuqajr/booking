<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Hotel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'user_id' => User::factory(),
            'hotel_id' => Hotel::factory(),
            'review' => $this->faker->paragraph,
            'rating' => $this->faker->numberBetween(1, 5),
        ];
    }
}
