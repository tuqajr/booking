<?php

namespace Database\Factories;

use App\Models\Hotel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Room>
 */
class RoomFactory extends Factory
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
            'hotel_id' => Hotel::factory(),
            'price' => $this->faker->randomFloat(2, 50, 500),
            'capacity' => $this->faker->numberBetween(1, 4),
            'description' => $this->faker->sentence,
            'room_type' => $this->faker->randomElement(['Single room', 'Double room', 'Twin room', 'Suite']),
        ];
    }
}
