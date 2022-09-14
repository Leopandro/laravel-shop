<?php

namespace Tests\Feature;

use App\Domain\Category\ProductCategory;
use App\Domain\Product\Product;
use App\Domain\ProductCity\ProductCity;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductFilterTest extends TestCase
{
    use RefreshDatabase;

    public function testListFilter(): void
    {
        /** @var ProductCategory $category */
        $category = ProductCategory::factory()->create();

        /** @var ProductCity $city */
        $city = ProductCity::factory()->create();

        /** @var Product $product */
        $product = Product::factory([
            'category_uuid' => $category->uuid,
            'city_uuid' => $city->uuid,
        ])->create();

        $response = $this->get('/');
        $response->assertSee($product->name);

        $category = ProductCategory::factory()->create();
        $city = ProductCity::factory()->create();
        $response = $this->get(route('products', [
            'filter[city]' => [$city->uuid],
            'filter[category]' => [$category->uuid]
        ]));
        $response->assertDontSee($product->name);
    }
}
