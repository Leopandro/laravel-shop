@php
/** @var \Illuminate\Pagination\LengthAwarePaginator|\App\Domain\Product\Product[] $products */
@endphp

<x-app-layout title="Products">
        <form action="{{ action(\App\Http\Controllers\Products\ProductIndexController::class) }}" method="get">
            @csrf
            <div class="grid grid-cols-2 gap-x-4 gap-y-6 my-12">
                <div>
                    @include('components.select', [
                        'name' => 'filter[category][]',
                        'items' => $filters['categories'],
                        'label' => 'Category',
                        'filter' => $filters['filter']['category'] ?? []
                    ])
                </div>

                <div>
                    @include('components.select', [
                        'name' => 'filter[city][]',
                        'items' => $filters['cities'],
                        'label' => 'City',
                        'filter' => $filters['filter']['city'] ?? []
                    ])
                </div>
                <div class="mt-4 flex items-center justify-end">
                    <x-button>Filter</x-button>
                </div>
            </div>
        </form>
    <div class="grid grid-cols-3 gap-12">
        @foreach($products as $product)
            <x-product
                :title="$product->name"
                :price="format_money($product->getItemPrice()->pricePerItemIncludingVat())"
                :actionUrl="action(\App\Http\Controllers\Cart\AddCartItemController::class, [$product])"
          />
        @endforeach
    </div>

    <div class="mx-auto mt-12">
        {{ $products->links() }}
    </div>
</x-app-layout>
