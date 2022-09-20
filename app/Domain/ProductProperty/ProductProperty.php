<?php
declare(strict_types=1);

namespace App\Domain\ProductProperty;

use App\Domain\ProductProperty\Traits\QueryBuilder\ProductPropertyBuilder;
use Database\Factories\PropertyValueFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property integer id
 * @property PropertyName name
 * @property ProductPropertyValue value
 */
class ProductProperty extends Model
{
    use HasFactory;
    use ProductPropertyBuilder;
    protected $table = 'product_properties';

    public $timestamps = false;

    protected static function newFactory(): PropertyValueFactory
    {
        return new PropertyValueFactory();
    }
}
