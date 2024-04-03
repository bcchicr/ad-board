<?php

namespace Database\Factories;

use App\Models\Advertisement;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Advertisement>
 */
class AdvertisementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(3),
            'content' => fake()->text(),
            'published_at' => now(),
        ];
    }

    public function configure()
    {
        return $this->afterMaking(function (Advertisement $advertisement) {
            $advertisement->category()->associate(Category::all()->random());
            $advertisement->user()->associate(User::all()->random());
        });
    }
}
