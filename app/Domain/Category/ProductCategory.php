<?php

namespace App\Domain\Category;

use Database\Factories\ProductCategoryFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected static function newFactory(): ProductCategoryFactory
    {
        return new ProductCategoryFactory();
    }
}
