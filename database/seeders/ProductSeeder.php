<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Product;
use App\Models\Brand;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'code_id' => 'PRO_01',
            'name_slug' => 'lapiz',
            'display_name' => 'lapiz',
            'description' => 'Un lapiz fabuloso',
            'quantity' => 4,
            'price' => 200.00,
            'brand_id' => Brand::where('name_slug','faber-castell')->first()->id,
            'category_id' => Category::where('name_slug','utencilios-escolares')->first()->id,
        ]);

        if (config('app.env') != 'production') {
            Product::factory()->count(100)->create();
        }
    }
}
