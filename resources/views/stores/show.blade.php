<x-app-layout>
    @slot('title', $store->name)
    @slot('header')
        <h2 class="text-xl font-semibold leading-tight">
            {{ $store->name }}
        </h2>
    @endslot

    <x-container>
        <div class="grid grid-cols-4 gap-6">
            @foreach ($products as $product)
                <x-card class="relative">
                    <a href="{{ route('stores.products.show', [$store, $product]) }}"
                        class="absolute inset-0 size-full"></a>
                    <x-card.header>
                        <x-card.title>{{ $product->name }}</x-card.title>
                        <x-card.description>
                            {{ \Illuminate\Support\Number::currency($product->price, 'IDR') }}
                        </x-card.description>
                    </x-card.header>
                </x-card>
            @endforeach
        </div>

        <div class="mt-6">
            {{ $products->links() }}
        </div>
    </x-container>
</x-app-layout>
