<?php
declare(strict_types=1);

namespace App\Domain\ProductProperty;

use Database\Factories\PropertyNameFactory;
use Database\Factories\PropertyValueFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property int id
 * @property string name
 */
class PropertyValue extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'property_values';

    protected static function newFactory(): PropertyValueFactory
    {
        return new PropertyValueFactory();
    }

    public function name(): HasOne
    {
        return $this->hasOne(PropertyName::class, 'id', 'property_name_id');
    }

//    public int $id;
//    public string $name;
}
