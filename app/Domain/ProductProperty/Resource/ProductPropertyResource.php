<?php

declare(strict_types=1);

namespace App\Domain\ProductProperty\Resource;

use App\Domain\ProductProperty\ProductProperty;
use App\Domain\ProductProperty\ProductPropertyValue;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductPropertyResource extends JsonResource
{
    /**
     * @param Request $request
     * @return array
     */
    public function toArray($request): array
    {
        /** @var ProductPropertyValue $productProperty */
        $productProperty = $this->resource;

        return [
            'id' => $productProperty->id,
            'name' => $productProperty->value
        ];
    }
}
