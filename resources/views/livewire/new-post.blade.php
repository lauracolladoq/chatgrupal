<div>
    <x-button wire:click="$set('openModalCrear', true)" class="btn btn-primary">Add Post</x-button>
    <x-dialog-modal wire:model="openModalCrear">
        <x-slot name="title">
            <div class="flex justify-between items-center">
                <h2 class="font-extrabold flex-grow text-center">Add New Post</h2>
                <button wire:click="cancelarCrear" class="flex-shrink-0 ml-auto">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"
                        color="#000000" fill="none">
                        <path d="M18 6L12 12M12 12L6 18M12 12L18 18M12 12L6 6" stroke="currentColor" stroke-width="1.5"
                            stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
            </div>
        </x-slot>
        <x-slot name="content">
            <div class="row flex items-center justify-between">
                <div class="column flex flex-col">
                    <x-label for="imagen1">Imagen:</x-label>
                    <x-input type="file" id="imagen1" wire:model="imagen" />
                    <x-input-error for="imagen" />
                </div>
                <div class="column">
                    <x-label for="contenido">Contenido:</x-label>
                    <textarea id="contenido" name="contenido" wire:model="contenido"></textarea>
                    <x-input-error for="contenido" />
                </div>
            </div>
            <div class="row h-100">
                <x-label for="tags">Tags:</x-label>
                <div class="flex flex-wrap">


                    @foreach ($misTags as $tag)
                        <p>{{ $tag->nombre }}</p>
                    @endforeach
                </div>
                <x-input-error for="tags" />
            </div>
        </x-slot>
        <x-slot name="footer">
            <button wire:click="store" wire:loading.attr="disabled" class="btn btn-primary btn-lg">
                Save
            </button>
        </x-slot>
    </x-dialog-modal>
</div>
