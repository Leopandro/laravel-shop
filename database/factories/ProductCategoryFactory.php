<?php

namespace Database\Factories;

use App\Domain\Category\ProductCategory;
use App\Domain\ProductCity\ProductCity;
use Illuminate\Database\Eloquent\Factories\Factory;
use Str;

class ProductCategoryFactory extends Factory
{
    protected $model = ProductCategory::class;

    public function definition(): array
    {
        return [
            'uuid' => Str::orderedUuid()->toString(),
            'name' => $this->faker->text(10),
        ];
    }
}
