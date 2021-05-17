<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $seeds[] = CreateDefaultUser::class; // UserSeeder::class;

        if (config('app.env') != 'production') {
            $seeds[] = BrandSeeder::class;
            $seeds[] = CategorySeeder::class;
            $seeds[] = ProductSeeder::class;
        }

        $this->call($seeds);
    }
}
