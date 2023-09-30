<?php

namespace Database\Seeders;

use App\Models\ProductsColors;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            ProductSeeder::class,
            UserSeeder::class,
            ImagesSeeder::class,
            ColorSeeder::class,
        ]);
    }
}
