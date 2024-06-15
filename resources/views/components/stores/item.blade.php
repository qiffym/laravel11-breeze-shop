@use('App\Enums\StoreStatus')

<x-card class="flex flex-col">
    <div class="flex-1">
        <x-card.header>
            <x-card.title>{{ $store->name }}</x-card.title>
            <x-card.description>
                <small>
                    Created at {{ $store->created_at->format('d F Y') }}
                    @if (!request()->routeIs('stores.mine'))
                        by {{ $store->user->name }}
                    @endif
                </small>
            </x-card.description>
        </x-card.header>

        <x-card.content>
            <section>
                <p class="mb-2">
                    {{ str($store->description)->limit() }}
                </p>
                <p class="text-sm text-zinc-400">
                    {{ $store->products_count }} {{ str('product')->plural($store->products_count) }}
                </p>
            </section>
        </x-card.content>
    </div>

    <x-card.footer>
        <div class="flex items-center justify-between">
            <x-badge>{{ $store->status }}</x-badge>
            @auth
                @if (auth()->user()->id === $store->user_id)
                    <a href="{{ route('stores.edit', $store) }}" class="text-blue-600 underline">Edit</a>
                @endif
            @endauth

            @isset($isAdmin)
                @if ($store->status === StoreStatus::PENDING)
                    <x-primary-button class="" x-data="" x-on:click.prevent="$dispatch('open-modal', 'modal-{{ $store->id }}')">
                        {{ __('Approve') }}
                    </x-primary-button>

                    <x-modal name="modal-{{ $store->id }}" :show="$errors->userDeletion->isNotEmpty()" focusable>
                        <form method="post" action="{{ route('stores.approve', $store) }}" class="p-6">
                            @csrf
                            @method('PUT')

                            <h2 class="text-lg font-medium text-zinc-900">
                                {{ $store->name }}
                            </h2>

                            <p class="mt-1 text-sm text-zinc-600">
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
            @endisset
        </div>
    </x-card.footer>
</x-card>
