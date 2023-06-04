<?php

namespace Database\Seeders;

use App\Models\Images;
use App\Models\Colors;
use App\Models\Product;
use App\Models\ProductCart;
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
    //    Product::factory(9)->create([
    //        'brand' => Str::random(6),
    //        'model' =>  Str::random(6),
    //        'size' =>  'L',
    //        'color_id' =>  1,
    //        'price' =>  100,
    //    ]);

       Colors::factory(1)->create([
           'color' => 'cyan',
           'product_id' => 2,
       ]);

        // Images::factory(1)->create([
        //     'name' => 'row4image1.png',
        //     'product_id' => 9
        // ]);

    //    ProductsColors::factory(1)->create([
    //        'product' => 3,
    //        'color' => 2,
    //    ]);
//
//        ProductCart::factory(1)->create([
//            'product_id' => 1,
//            'color_id' => 1,
//            'count' => 2,
//            'total_count' => 400,
//            'user_id' => 1,
//        ]);

    }
}
