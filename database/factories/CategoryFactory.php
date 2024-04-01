<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\SuperCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->word(),
        ];
    }

    public function configure()
    {
        return $this->afterMaking(function (Category $category) {
            $category->superCategory()->associate(SuperCategory::all()->random());
        });
    }
}
