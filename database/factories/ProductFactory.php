<?php

namespace Database\Factories;

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
    public function definition(): array
    {
        $productName = $this->faker->unique()->words($nb=3, $asText=true);

        // Generate a unique filename
        $filename = uniqid() . '.jpg';

        return [
            'name' => $productName,
            'price' => $this->faker->numberBetween(10, 500),
            'image' => 'https://picsum.photos/640/480?random=' . rand(1, 1000),
            'description' => $this->faker->paragraphs(3, true),
        ];
    }
}
