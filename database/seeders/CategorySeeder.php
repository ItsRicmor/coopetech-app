<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        Category::create([
            'name_slug' => 'utencilios-escolares',
            'display_name' => 'Utensilios Escolares'
        ]);

        if (config('app.env') != 'production') {
            Category::factory()->count(50)->create();
        }
    }
}