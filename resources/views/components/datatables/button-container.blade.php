@props(['isEdit' => [],'isDelete' => [],'isRestore' => []])
<div class="flex space-x-2">
    @if ($isEdit)
    <button type="button" class="dark:text-white hover:bg-primary transition-colors hover:text-blue-500">
        <i class='bx bx-edit text-base'></i>
    </button>
    @endif
    @if ($isDelete)
    <button type="button" class="dark:text-white hover:bg-danger transition-colors hover:text-red-500">
        <i class='bx bx-trash text-base'></i>
    </button>
    @endif
    @if ($isRestore)
    <button type="button" class="dark:text-white hover:bg-info transition-colors hover:text-lime-500">
        <i class='bx bx-recycle text-base'></i>
    </button>
    @endif
</div>