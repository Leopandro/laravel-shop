<?php
declare(strict_types=1);

namespace App\Domain\ProductProperty;

use Database\Factories\ProductPropertyValueFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property int id
 * @property string name
 * @property PropertyValue value
 */
class ProductPropertyValue extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected static function newFactory(): ProductPropertyValueFactory
    {
        return new ProductPropertyValueFactory();
    }

    public function value(): HasOne
    {
        return $this->hasOne(PropertyValue::class);
    }

//    public int $id;
//
//    public string $value;
}
