<?php

namespace App\Domain\ProductCity;

use Database\Factories\ProductCityFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCity extends Model
{
    protected $table = 'product_cities';

    use HasFactory;

    protected $guarded = [];

    protected static function newFactory(): ProductCityFactory
    {
        return new ProductCityFactory();
    }
}
