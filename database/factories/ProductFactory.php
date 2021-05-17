<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;
use App\Models\Product;
use App\Models\Brand;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition()
    {
        $name = $this->faker->bs;
        return [
            'code_id' => $this->faker->swiftBicNumber,
            'name_slug' => strtolower(str_replace(' ', '_', $name)),
            'display_name' => $name,
            'description' => $this->faker->text(200),
            'quantity' => $this->faker->numberBetween(1,50),
            'price' => $this->faker->numberBetween(100,25000),
            'brand_id' => Brand::all()->random()->id,
            'category_id' => Category::all()->random()->id,
        ];
    }
}