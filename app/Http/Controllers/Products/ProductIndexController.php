<?php
declare(strict_types=1);

namespace App\Http\Controllers\Products;

use App\Domain\Product\Product;
use App\Domain\ProductProperty\ProductProperty;
use App\Domain\ProductProperty\PropertyName;
use App\Domain\ProductProperty\Resource\ProductPropertyResource;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class ProductIndexController
{
    public function list(Request $request)
    {
        $products = QueryBuilder::for(Product::class)->allowedFilters([
                AllowedFilter::callback('city', static function ($query, $value) {
                    $value = array_filter($value);
                    $query->whereHas('properties', function (Builder $query) use ($value) {
                        $query->whereIn('property_value_id', $value);
                    });
                }),
                AllowedFilter::callback('category', static function ($query, $value) {
                    $value = array_filter($value);
                    $query->whereHas('properties', function (Builder $query) use ($value) {
                        $query->whereIn('property_value_id', $value);
                    });
                }),
        ])->paginate();
        $cityId = PropertyName::query()->firstWhere(['name' => 'City'])->id;
        $categoryId = PropertyName::query()->firstWhere(['name' => 'Category'])->id;
        $cities = ProductPropertyResource::collection(ProductProperty::getPropertiesList($request,$cityId)->all())->toArray($request);
        $categories = ProductPropertyResource::collection(ProductProperty::getPropertiesList($request,$categoryId)->all())->toArray($request);

        $filters = [
            'cities' => $cities,
            'categories' => $categories,
            'filter' => $_GET['filter'] ?? []
        ];
        return view('products.index', [
            'products' => $products,
            'filters' => $filters
        ]);
    }
}
