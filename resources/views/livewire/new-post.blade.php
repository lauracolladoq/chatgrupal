<div>
    <x-button wire:click="$set('openModalCrear', true)">Nuevo</x-button>
    <x-dialog-modal wire:model="openModalCrear">
        <x-slot name="title">
            Nuevo Post
        </x-slot>

        <x-slot name="content">
            <form>
                <div>
                    <x-label for="image">Imagen:</x-label>
                    <x-input type="file" id="image" name="image" />
                    <x-input-error for="image" />
                </div>
                <div>
                    <x-label for="content">Contenido:</x-label>
                    <textarea id="content" name="content"></textarea>
                    <x-input-error for="content" />
                </div>
                <div>
                    <x-label for="tag_id">Tags:</x-label>
                    <select id="tag_id" name="tags[]" multiple class="p-5">
                        @foreach ($tags as $tag)
                            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                        @endforeach
                    </select>
                    <x-input-error for="tags[]" />
                </div>
            </form>
        </x-slot>

        <x-slot name="footer">
            <div class="flew flew-row-reverse">
                <button wire:click="store" wire:loading.attr="disabled">
                    GUARDAR
                </button>
                <button wire:click="cancelarCrear">
                    CANCELAR
                </button>
            </div>
        </x-slot>
    </x-dialog-modal>
</div>
