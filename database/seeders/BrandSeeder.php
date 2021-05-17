<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Brand;

class BrandSeeder extends Seeder
{
    public function run()
    {
        Brand::create([
            'name_slug' => 'faber-castell',
            'display_name' => 'Faber Castell'
        ]);

        if (config('app.env') != 'production') {
            Brand::factory()->count(50)->create();
        }
    }
}
