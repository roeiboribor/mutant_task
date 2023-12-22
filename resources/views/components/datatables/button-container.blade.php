@props(['rowId' => null,'isEdit' => false,'editModalName' => '','isDelete' => false,'deleteModalName' => '','isRestore'
=>
false,'restoreModalName' => ''])
<div wire:key="btn-container-{{ $rowId }}" class="flex space-x-2">
    @if ($isEdit)
    <button @click="$wire.dispatch('{{ $editModalName }}', { id: {{ $rowId }} });"
        x-on:click.prevent="$dispatch('open-modal', '{{ $editModalName }}')" type="button"
        class="dark:text-white hover:bg-primary transition-colors hover:text-blue-500">
        <i class='bx bx-edit text-base'></i>
    </button>
    @endif
    @if ($isDelete)
    <button @click="$wire.dispatch('{{ $deleteModalName }}', { id: {{ $rowId }} });"
        x-on:click.prevent="$dispatch('open-modal', '{{ $deleteModalName }}')" type="button"
        class="dark:text-white hover:bg-danger transition-colors hover:text-red-500">
        <i class='bx bx-trash text-base'></i>
    </button>
    @endif
    @if ($isRestore)
    <button @click="$wire.dispatch('{{ $restoreModalName }}', { id: {{ $rowId }} });"
        x-on:click.prevent="$dispatch('open-modal', '{{ $restoreModalName }}')" type="button"
        class="dark:text-white hover:bg-info transition-colors hover:text-lime-500">
        <i class='bx bx-recycle text-base'></i>
    </button>
    @endif
</div>