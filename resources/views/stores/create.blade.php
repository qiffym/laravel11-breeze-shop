<x-app-layout>
    @slot('title', 'Create Store')
    @slot('header')
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Create a store') }}
        </h2>
    @endslot

    <x-container>
        <x-card class="max-w-2xl">
            <x-card.header>
                <x-card.title>
                    Store
                </x-card.title>
                <x-card.description>
                    Create your own store
                </x-card.description>
            </x-card.header>
            <x-card.content>
                <form action="{{ route('stores.store') }}" method="POST" enctype="multipart/form-data"
                    class="[&>div]:mb-6">
                    @csrf
                    <!-- Logo -->
                    <div>
                        <x-input-label for="logo" class="sr-only" :value="__('Logo')" />
                        <input id="logo" class="block mt-1" type="file" name="logo" :value="old('logo')"
                            required />
                        <x-input-error :messages="$errors->get('logo')" class="mt-2" />

                    </div>
                    <!-- Name -->
                    <div>
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" class="block w-full mt-1" type="text" name="name"
                            :value="old('name')" required />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
                    <!-- Description -->
                    <div>
                        <x-input-label for="description" :value="__('Description')" />
                        <x-textarea id="description" class="block w-full mt-1" name="description" required>
                            {{ old('description') }}
                        </x-textarea>
                        <x-input-error :messages="$errors->get('description')" class="mt-2" />
                    </div>

                    <x-primary-button>Create</x-primary-button>
                </form>
            </x-card.content>
        </x-card>
    </x-container>
</x-app-layout>
