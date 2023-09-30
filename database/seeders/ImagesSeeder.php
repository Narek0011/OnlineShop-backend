<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Images;

class ImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Images for product
        Images::factory(1)->create([
            'name' => 'row4image1.png',
            'product_id' => 1
        ]);
        Images::factory(1)->create([
            'name' => 'row4image2.png',
            'product_id' => 2
        ]);
        Images::factory(1)->create([
            'name' => 'row4image3.png',
            'product_id' => 3
        ]);
        Images::factory(1)->create([
            'name' => 'row4image2.png',
            'product_id' => 4
        ]);
        Images::factory(1)->create([
            'name' => 'row4image3.png',
            'product_id' => 5
        ]);
        Images::factory(1)->create([
            'name' => 'row4image4.png',
            'product_id' => 6
        ]);
        Images::factory(1)->create([
            'name' => 'row4image3.png',
            'product_id' => 7
        ]);
        Images::factory(1)->create([
            'name' => 'row4image2.png',
            'product_id' => 8
        ]);
        Images::factory(1)->create([
            'name' => 'row4image1.png',
            'product_id' => 9
        ]);
    }
}
