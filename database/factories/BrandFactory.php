<?php

namespace Database\Factories;

use App\Models\Brand;
use Illuminate\Database\Eloquent\Factories\Factory;

class BrandFactory extends Factory
{
    protected $model = Brand::class;

    public function definition()
    {
        $name = $this->faker->city;
        return [
            'name_slug' => strtolower(str_replace(' ', '_', $name)),
            'display_name' => $name
        ];
    }
}
