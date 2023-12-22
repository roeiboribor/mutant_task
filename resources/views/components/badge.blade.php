<span {!! $attributes->merge(['class' => 'bg-purple-500 px-3 py-1.5 rounded-full']) !!}>
    {{ $value ?? $slot }}
</span>