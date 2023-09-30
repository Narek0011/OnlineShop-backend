<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
           Product::factory(8)->create([
               'brand' => Str::random(6),
               'model' =>  Str::random(6),
               'size' =>  'L',
               'color_id' =>  1,
               'price' =>  100,
           ]);
    }
}
