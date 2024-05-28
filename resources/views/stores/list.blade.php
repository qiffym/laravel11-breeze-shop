<x-app-layout>
    @slot('title', 'List Stores')
    @slot('header')
        <h2 class="text-xl font-semibold leading-tight">
            {{ __('List Stores') }}
        </h2>
    @endslot

    <x-container>
        <div class="grid grid-cols-4 gap-6">
            @foreach ($stores as $store)
                <x-stores.item :$isAdmin :$store />
            @endforeach
        </div>

        <div class="mt-10">
            {{ $stores->links() }}
        </div>
    </x-container>
</x-app-layout>
