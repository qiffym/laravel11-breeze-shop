<textarea {{ $attributes->merge(['class' => 'border-zinc-800 bg-zinc-950 rounded-md shadow-sm']) }} rows="5">
    {{ $slot }}
</textarea>
