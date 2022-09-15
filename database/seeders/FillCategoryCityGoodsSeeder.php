<?php

namespace Database\Seeders;

use App\Domain\Category\ProductCategory;
use App\Domain\ProductCity\ProductCity;
use App\Domain\Product\Product;
use Illuminate\Database\Seeder;

class FillCategoryCityGoodsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductCity::factory()->count(300)->create();
        ProductCategory::factory()->count(100)->create();
        for ($i = 0; $i < 50000; $i++) {
            Product::factory()->create();
            if ($i % 100 == 0) {
                echo "$i"."\r";
            }
        }
    }
}
