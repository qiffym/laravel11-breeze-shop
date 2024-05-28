<x-app-layout>
    @slot('title')
        {{ $page_meta['title'] }}
    @endslot
    @slot('header')
        <h2 class="text-xl font-semibold leading-tight">
            {{ __($page_meta['title']) }}
        </h2>
    @endslot

    <x-container>
        <x-card class="max-w-2xl">
            <x-card.header>
                <x-card.title>
                    {{ $page_meta['title'] }}
                </x-card.title>
                <x-card.description>
                    {{ $page_meta['description'] }}
                </x-card.description>
            </x-card.header>
            <hr class="mb-6 border-zinc-800">
            <x-card.content>
                <form action="{{ $page_meta['url'] }}" method="POST" enctype="multipart/form-data" class="[&>div]:mb-6"
                    novalidate>
                    @csrf
                    @method($page_meta['method'])

                    <!-- Logo -->
                    <div>
                        <x-input-label for="logo" class="sr-only" :value="__('Logo')" />
                        <input id="logo" type="file" name="logo" />
                        <x-input-error :messages="$errors->get('logo')" class="mt-2" />

                    </div>
                    <!-- Name -->
                    <div>
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" class="block w-full mt-1" type="text" name="name"
                            :value="old('name', $store->name)" required />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
                    <!-- Description -->
                    <div>
                        <x-input-label for="description" :value="__('Description')" />
                        <x-textarea id="description" class="block w-full mt-1" name="description" required>
                            {{ old('description', $store->description) }}
                        </x-textarea>
                        <x-input-error :messages="$errors->get('description')" class="mt-2" />
                    </div>

                    <x-primary-button>Save</x-primary-button>
                </form>
            </x-card.content>
        </x-card>
    </x-container>
</x-app-layout>
