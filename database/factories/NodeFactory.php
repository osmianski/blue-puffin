<?php

namespace Database\Factories;

use App\Models\Page;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Node;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Node>
 */
class NodeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return array_merge([
            'type' => $type = fake()->optional(0.1)->randomElement(Node\Type::cases()),
            'page_id' => Page::factory(),
        ], match($type) {
            Node\Type::Database => [
                'owner_id' => User::factory(),
            ],
            default => [
                'data->text' => fake()->paragraph,
            ],
        });
    }
}
