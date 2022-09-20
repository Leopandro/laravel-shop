<?php
declare(strict_types=1);
namespace App\Domain\ProductProperty\Traits\QueryBuilder;

use App\Domain\ProductProperty\ProductProperty;
use App\Domain\ProductProperty\PropertyValue;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Spatie\QueryBuilder\QueryBuilder;

trait ProductPropertyBuilder
{
    public static function getPropertiesList(Request $request, int $id): LengthAwarePaginator
    {
        return self::buildListQueryForProperties($id)->paginate($request->get('count', 100));
    }
    public static function buildListQueryForProperties(int $id): QueryBuilder
    {
        return QueryBuilder::for(PropertyValue::class)
            ->with(['name'])
            ->whereHas('name', function(Builder $query) use ($id) {
                $query->where('property_values.property_name_id', '=', $id);
            })
            ->select(['property_values.*']);
    }
}
