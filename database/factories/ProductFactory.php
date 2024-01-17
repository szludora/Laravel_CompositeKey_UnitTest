<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Part;
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
        return [
            'name' => fake('hu_HU')->name,
            'part_id' => Part::all()->random->part_id,
            'brand_id' => Brand::all()->random->brand_id,
        ];
    }
}
