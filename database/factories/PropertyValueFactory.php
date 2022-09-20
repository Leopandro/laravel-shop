<?php

namespace Database\Factories;

use App\Domain\ProductProperty\PropertyValue;
use Illuminate\Database\Eloquent\Factories\Factory;

class PropertyValueFactory extends Factory
{
    protected $model = PropertyValue::class;

    public function definition()
    {
        return [
            'value' => $this->faker->text(10)
        ];
    }
}
