<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;

class CreateProduct extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brand = Brand::create([
            'name_slug' => 'faber-castell',
            'display_name' => 'Faber Castell'
        ]);

        $category = Category::create([
            'name_slug' => 'utencilios-escolares',
            'display_name' => 'Utensilios Escolares'
        ]);

        $product = Product::create([
            'code_id' => 'PRO_01',
            'name_slug' => 'lapiz',
            'display_name' => 'lapiz',
            'description' => 'Un lapiz fabuloso',
            'quantity' => 4,
            'price' => 200.00,
            'brand_id' => $brand->id,
            'category_id' => $category->id
        ]);

    }
}
