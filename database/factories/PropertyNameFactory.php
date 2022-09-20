<?php

namespace Database\Factories;

use App\Domain\ProductProperty\PropertyName;
use Illuminate\Database\Eloquent\Factories\Factory;

class PropertyNameFactory extends Factory
{
    protected $model = PropertyName::class;

    public function definition()
    {
        return [
            'name' => $this->faker->text(10),
        ];
    }
}
