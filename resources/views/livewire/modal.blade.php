<div>
    <x-dialog-modal wire:model="openModal">
        <x-slot name="title">
            Detalle producto
        </x-slot>

        <x-slot name="content">
            <div>
                Hola
            </div>
        </x-slot>

        <x-slot name="footer">
            <div class="flex flex-row-reverse">
                <button wire:click="cancelarS"
                    class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">
                    <i class="fas fa-arrow-left mr-2"></i>Volver
                </button>
            </div>
        </x-slot>
    </x-dialog-modal>
</div>
