<x-app-layout>
    @slot('title', 'My stores')
    @slot('header')
        <h2 class="text-xl font-semibold leading-tight">
            {{ __('My stores') }}
        </h2>
    @endslot

    <x-container>
        @if ($stores->count())
            <div class="grid grid-cols-4 gap-6">
                @foreach ($stores as $store)
                    <x-stores.item :$store />
                @endforeach
            </div>
        @else
            <p class="text-zinc-400">
                You don't have any store yet.
            </p>
        @endif
    </x-container>
</x-app-layout>
