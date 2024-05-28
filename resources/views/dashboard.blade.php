<x-app-layout>
    @slot('title', 'Dashboard')
    @slot('header')
        <h2 class="text-xl font-semibold leading-tight">
            {{ __('Dashboard') }}
        </h2>
    @endslot

    <x-container>
        <x-card class="p-6">
            {{ __("You're logged in!") }}
        </x-card>
    </x-container>
</x-app-layout>
