<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Store;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $store = Store::inRandomOrder()->first();
        return [
            //
            'name' => $this->faker->words(1, true),
            'description' => $this->faker->sentence(5),
            'price' => $this->faker->randomFloat(1, 1,599),
            'compare_price' => $this->faker->randomFloat(1, 600 , 999),
            'rating' => $this->faker->randomElement([1, 2, 3, 4]),
            'category_id' => Category::where('store_id', $store->id)->inRandomOrder()->first()->id,
            'store_id' => $store->id,
        ];
    }
}
