<x-app-layout>
    @slot('title', 'Home')
    @slot('header')
        <h2 class="text-xl font-semibold leading-tight">
            {{ __('Home') }}
        </h2>
    @endslot

    <x-container>
        <div class="overflow-hidden shadow-sm bg-zinc-800 sm:rounded-lg">
            <div class="p-6">
                Homepage
            </div>
        </div>
    </x-container>
</x-app-layout>
