<div>
    <a href="#" class="menu-item" wire:click.prevent="openModal">
        <span><img src="https://cdn.hugeicons.com/icons/paint-board-stroke-rounded.svg" alt="paint-board" width="48"
                height="48" /></span>
        <h3>Theme</h3>
    </a>
</div>
<x-dialog-modal>
    <x-slot name="title">
        Hola
    </x-slot>
    <x-slot name="content">
        Hola
    </x-slot>
    <x-slot name="footer">
        Hola
    </x-slot>
</x-dialog-modal>
