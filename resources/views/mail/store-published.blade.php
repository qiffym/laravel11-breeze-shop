{{-- blade-formatter-disable-next-line --}}

<x-mail::message>
# Hallo, {{ $store->user->name }}

Toko yang Anda registrasikan ({{ $store->name }}) telah disetujui dan dipublish.

<x-mail::button url="{{ route('stores.show', $store) }}">
    Lihat Toko
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
