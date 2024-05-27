@use('App\Enums\StoreStatus')

<x-app-layout>
    @slot('title', 'List Stores')
    @slot('header')
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('List Stores') }}
        </h2>
    @endslot

    <x-container>
        <div class="grid grid-cols-3 gap-6">
            @foreach ($stores as $store)
                <x-card>
                    <x-card.header>
                        <x-card.title>{{ $store->name }}</x-card.title>
                        <x-card.description>
                            Dibuat: {{ $store->created_at->format('d F Y') }} oleh {{ $store->user->name }}
                        </x-card.description>
                    </x-card.header>
                    <x-card.content>
                        <section>
                            <p class="mb-6">
                                {{ $store->description }}
                            </p>

                            @if ($store->status === StoreStatus::PENDING)
                                <x-primary-button class="" x-data=""
                                    x-on:click.prevent="$dispatch('open-modal', 'modal-{{ $store->id }}')">
                                    {{ __('Approve') }}
                                </x-primary-button>


                                <x-modal name="modal-{{ $store->id }}" :show="$errors->userDeletion->isNotEmpty()" focusable>
                                    <form method="post" action="{{ route('stores.approve', $store) }}" class="p-6">
                                        @csrf
                                        @method('PUT')

                                        <h2 class="text-lg font-medium text-gray-900">
                                            {{ $store->name }}
                                        </h2>

                                        <p class="mt-1 text-sm text-gray-600">
                                            {{ $store->description }}
                                        </p>

                                        <div class="flex justify-end mt-6">
                                            <x-secondary-button x-on:click="$dispatch('close')">
                                                {{ __('Cancel') }}
                                            </x-secondary-button>

                                            <x-primary-button class="ms-3">
                                                {{ __('Approve') }}
                                            </x-primary-button>
                                        </div>
                                    </form>
                                </x-modal>
                            @endif
                        </section>
                    </x-card.content>
                </x-card>
            @endforeach
        </div>
    </x-container>
</x-app-layout>