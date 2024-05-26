<x-app-layout>
    @slot('title', 'Stores Management')
    @slot('header')
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Stores') }}
        </h2>
    @endslot

    <x-container>
        <div class="grid grid-cols-4 gap-6">
            @foreach ($stores as $store)
                <x-card>
                    <div class="p-6 pb-0">
                        <img src="{{ url($store->logo) }}" alt="{{ $store->name }}" class="rounded-lg size-16">
                    </div>
                    <x-card.header>
                        <x-card.title>
                            {{ $store->name }}
                        </x-card.title>
                        <x-card.description>
                            {{ $store->description }}
                        </x-card.description>
                        @auth
                            @if (auth()->user()->id === $store->user_id)
                                <a href="{{ route('stores.edit', $store) }}" class="text-blue-600 underline">Edit</a>
                            @endif
                        @endauth
                    </x-card.header>
                </x-card>
            @endforeach
        </div>
    </x-container>
</x-app-layout>
