<?php

namespace Database\Factories;

use App\Domain\ProductCity\ProductCity;
use Illuminate\Database\Eloquent\Factories\Factory;
use Str;

class ProductCityFactory extends Factory
{
    protected $model = ProductCity::class;

    public function definition(): array
    {
        return [
            'uuid' => Str::orderedUuid()->toString(),
            'name' => $this->faker->text(10),
        ];
    }
}
