<?php
declare(strict_types=1);

namespace Database\Seeders;

use App\Domain\Product\Product;
use App\Domain\ProductProperty\ProductProperty;
use App\Domain\ProductProperty\PropertyName;
use App\Domain\ProductProperty\PropertyValue;
use App\Domain\ProductProperty\ProductPropertyValue;
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
        /** @var PropertyName $productPropertyCity */
        $productPropertyCity = PropertyName::query()->firstWhere(['name' => 'City']) ?? PropertyName::factory()->create([
            'name' => 'City',
        ]);
        /** @var PropertyName $productPropertyCity */
        $productPropertyCategory = PropertyName::query()->firstWhere(['name' => 'Category']) ?? PropertyName::factory()->create([
            'name' => 'Category',
        ]);

        $productCityValues = PropertyValue::factory(30)->create([
            'property_name_id' => $productPropertyCity->id
        ]);
        $productCategoryValues = PropertyValue::factory(100)->create([
            'property_name_id' => $productPropertyCategory->id
        ]);
        for ($i = 0; $i < 50000; $i++) {
            $product = Product::factory()->create();


            /** @var PropertyValue $productPropertyNameValue */
            $productPropertyCityNameValue = ProductPropertyValue::factory()->create([
                'product_id' => $product->getAttribute('id'),
                'property_value_id' => $productCityValues->random()->id,
            ]);

            /** @var PropertyValue $productPropertyNameValue */
            $productPropertyCategoryNameValue = ProductPropertyValue::factory()->create([
                'product_id' => $product->getAttribute('id'),
                'property_value_id' => $productCategoryValues->random()->id,
            ]);

            if ($i % 100 == 0) {
                echo "$i"."\r";
            }
        }
    }
}
