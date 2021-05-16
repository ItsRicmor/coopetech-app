<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    protected $model = Category::class;

    public function definition()
    {
        $name = $this->faker->catchPhrase;
        return [
            'name_slug' => strtolower(str_replace(' ', '_', $name)),
            'display_name' => $name
        ];
    }
}
