<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Colors;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Colors::factory(1)->create([
           'color' => 'cyan',
           'product_id' => 1,
       ]);
        Colors::factory(1)->create([
            'color' => 'red',
            'product_id' => 1,
        ]);
        Colors::factory(1)->create([
            'color' => 'yellow',
            'product_id' => 1,
        ]);
        Colors::factory(1)->create([
            'color' => 'red',
            'product_id' => 2,
        ]);
        Colors::factory(1)->create([
            'color' => 'green',
            'product_id' => 2,
        ]);
        Colors::factory(1)->create([
            'color' => 'cyan',
            'product_id' => 2,
        ]);
        Colors::factory(1)->create([
            'color' => 'yellow',
            'product_id' => 3,
        ]);
        Colors::factory(1)->create([
            'color' => 'red',
            'product_id' => 3,
        ]);
        Colors::factory(1)->create([
            'color' => 'black',
            'product_id' => 4,
        ]);
        Colors::factory(1)->create([
            'color' => 'yellow',
            'product_id' => 4,
        ]);
        Colors::factory(1)->create([
            'color' => 'green',
            'product_id' => 5,
        ]);
        Colors::factory(1)->create([
            'color' => 'cyan',
            'product_id' => 5,
        ]);
        Colors::factory(1)->create([
            'color' => 'red',
            'product_id' => 6,
        ]);
        Colors::factory(1)->create([
            'color' => 'yellow',
            'product_id' => 6,
        ]);
        Colors::factory(1)->create([
            'color' => 'red',
            'product_id' => 7,
        ]);
        Colors::factory(1)->create([
            'color' => 'yellow',
            'product_id' => 7,
        ]);
        Colors::factory(1)->create([
            'color' => 'red',
            'product_id' => 8,
        ]);
        Colors::factory(1)->create([
            'color' => 'black',
            'product_id' => 8,
        ]);
    }
}
