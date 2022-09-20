<?php
declare(strict_types=1);

namespace App\Domain\ProductProperty;

use Database\Factories\PropertyNameFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int id
 * @property string name
 */
class PropertyName extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'property_names';

    protected static function newFactory(): PropertyNameFactory
    {
        return new PropertyNameFactory();
    }
//    public int $id;
//    public string $name;
}
