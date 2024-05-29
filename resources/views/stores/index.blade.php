<x-app-layout>
    @slot('title', 'Stores Management')
    @slot('header')
        <h2 class="text-xl font-semibold leading-tight">
            {{ __('Stores') }}
        </h2>
    @endslot

    <x-container>
        <div class="grid grid-cols-4 gap-6">
            @foreach ($stores as $store)
                <x-card class="relative">
                    <a href="{{ route('stores.show', $store) }}" class="absolute inset-0 size-full"></a>
                    <div class="p-6 pb-0">
                        @if ($store->logo)
                            <img src="{{ url($store->logo) }}" alt="{{ $store->name }}" class="rounded-lg size-16">
                        @else
                            <div class="rounded-lg size-16 bg-zinc-800"></div>
                        @endif
                    </div>
                    <x-card.header>
                        <x-card.title>{{ $store->name }}</x-card.title>
                        <x-card.description>
                            {{ str($store->description)->limit() }}
                        </x-card.description>
                    </x-card.header>
                    <x-card.content>
                        @auth
                            @if (auth()->user()->id === $store->user_id)
                                <a href="{{ route('stores.edit', $store) }}" class="text-blue-600 underline">Edit</a>
                            @endif
                        @endauth
                    </x-card.content>
                </x-card>
            @endforeach
        </div>
    </x-container>
</x-app-layout>
