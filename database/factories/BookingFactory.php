<?php

namespace Database\Factories;

use App\Models\Room;
use App\Models\User;
use App\Models\Coupon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Booking>
 */
class BookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $checkIn = $this->faker->dateTimeBetween('+1 week', '+3 months');
        $checkOut = $this->faker->dateTimeBetween($checkIn, (clone $checkIn)->modify('+7 days'));

        return [
            'user_id' => User::factory(),
            'room_id' => Room::factory(),
            'coupon_id' => $this->faker->boolean(50) ? Coupon::factory() : null,
            'check_in' => $checkIn,
            'check_out' => $checkOut,
            'price' => $this->faker->randomFloat(2, 100, 1000),
            'status' => $this->faker->randomElement(['confirmed', 'cancelled', 'pending']),
        ];
    }
}
