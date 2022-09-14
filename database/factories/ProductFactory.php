<?php

namespace Database\Factories;

use App\Domain\Category\ProductCategory;
use App\Domain\Product\Product;
use App\Domain\ProductCity\ProductCity;
use App\Support\Uuid;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition(): array
    {
        $productCity = ProductCity::inRandomOrder()->first();
        $productCategory = ProductCategory::inRandomOrder()->first();
        return [
            'uuid' => Uuid::new(),
            'city_uuid' => $productCity?->uuid,
            'category_uuid' => $productCategory?->uuid,
            'name' => strtoupper($this->faker->bothify('?????-##')),
            'item_price' => $this->faker->numberBetween(10_00, 1000_00),
            'vat_percentage' => $this->faker->randomElement([0, 6, 12, 21]),
        ];
    }
}
