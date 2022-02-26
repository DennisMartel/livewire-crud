<div>
    <x-jet-danger-button class="flex items-center whitespace-nowrap" wire:click="$set('open', true)">
        Crear empleado
    </x-jet-danger-button>

    <x-jet-dialog-modal wire:model="open">
        <x-slot name="title">
            Nuevo empleado
        </x-slot>
        <x-slot name="content">
            <div class="mb-4">
                <x-jet-label>Nombre del empleado</x-jet-label>
                <x-jet-input id="name" class="block mt-1 w-full" type="text" wire:model.defer="name" name="name" :value="old('name')" required autofocus />
                @error('name') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <x-jet-label>Edad del empleado</x-jet-label>
                <x-jet-input id="age" class="appearance-none block mt-1 w-full" wire:model.defer="age" type="number" name="age" :value="old('age')" required autofocus />
                @error('age') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('open', false)" class="ml-4 flex items-center whitespace-nowrap">
                Cancelar
            </x-jet-secondary-button>
            <x-jet-danger-button wire:click="save()" wire.loading.attr="disabled" class="ml-4 flex items-center whitespace-nowrap">
                Registrar
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
