<div class="space-x-1">
    @forelse ($data as $key => $value)
    <x-badge value="{{ $value }}" class="{{ ($class ?? '') }}" />
    @empty
    <span>-</span>
    @endforelse
</div>