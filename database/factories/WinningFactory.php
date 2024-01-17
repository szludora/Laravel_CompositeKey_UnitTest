<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Part;
use App\Models\Product;
use App\Models\User;
use App\Models\Winning;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Winning>
 */
class WinningFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $repeats = 10;
        do {
            $user_id = User::all()->random()->id;
            $brand_id = Brand::all()->random()->brand_id;
            $part_id = Part::all()->random()->part_id;

            $winning = Winning::where('user_id', $user_id)
                ->where('brand_id', $brand_id)
                ->where('part_id', $part_id)
                ->get();
            $repeats--;
        } while ($repeats >= 0 && count($winning) > 0);

        return [
            'user_id' => $user_id,
            'brand_id' => $brand_id,
            'part_id' => $part_id,
            'product_id' => Product::all()->random()->product_id,
            'date' => fake()->date,
        ];
    }
}
