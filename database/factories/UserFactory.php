<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return array_merge([
            'type' => $type = fake()->optional()->randomElement(User\Type::cases()),
        ], match($type) {
            User\Type::Organization => [
                'data->name' => fake()->unique()->company(),
            ],
            default => [
                'data->name' => fake()->unique()->name(),
                'email' => fake()->unique()->safeEmail(),
                'data->email_verified_at' => now(),
                'data->password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'data->remember_token' => Str::random(10),
            ],
        });
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
