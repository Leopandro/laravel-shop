<?php

namespace App\Http\Controllers\Products;

use App\Domain\Category\ProductCategory;
use App\Domain\Product\Product;
use App\Domain\ProductCity\ProductCity;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Database\Eloquent\Builder;

class ProductIndexController
{
    public function __invoke()
    {
        $products = QueryBuilder::for(Product::class)
            ->select(['products.*'])
            ->allowedFilters([
                AllowedFilter::callback('city', static function (Builder $query, $values) {
                    $values = array_filter($values);
                    $bindingsString = implode(',', array_fill(0, count($values), '?'));
                    $query->whereRaw("JSON_EXTRACT(properties, '$.city_uuid') in ( {$bindingsString} )", $values);
                }),
                AllowedFilter::callback('category', static function (Builder $query, $values) {
                    $values = array_filter($values);
                    $bindingsString = implode(',', array_fill(0, count($values), '?'));
                    $query->whereRaw("JSON_EXTRACT(properties, '$.category_uuid') in ( {$bindingsString} )", $values);
                }),
            ])
            ->paginate();
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
