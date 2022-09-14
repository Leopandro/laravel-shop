<?php

namespace App\Http\Controllers\Products;

use App\Domain\Category\ProductCategory;
use App\Domain\Product\Product;
use App\Domain\ProductCity\ProductCity;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class ProductIndexController
{
    public function __invoke()
    {
        $products = QueryBuilder::for(Product::class)->allowedFilters([
                AllowedFilter::callback('city', static function ($query, $value) {
                    $value = array_filter($value);
                    $query->whereIn('city_uuid', $value);
                }),
                AllowedFilter::callback('category', static function ($query, $value) {
                    $value = array_filter($value);
                    $query->whereIn('category_uuid', $value);
                }),
            ])->paginate();
        $filters = [
            'cities' => ProductCity::all(),
            'categories' => ProductCategory::all(),
            'filter' => $_GET['filter'] ?? []
        ];
        return view('products.index', [
            'products' => $products,
            'filters' => $filters
        ]);
    }
}
