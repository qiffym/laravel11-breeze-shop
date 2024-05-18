<x-app-layout>
    @slot('title', 'Dashboard')
    @slot('header')
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Dashboard') }}
        </h2>
    @endslot

    <x-container>
        <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                {{ __("You're logged in!") }}
            </div>
        </div>
    </x-container>
</x-app-layout>
