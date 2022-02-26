<div>
    <a wire:click="$set('open', true)" class="cursor-pointer text-indigo-600 hover:text-indigo-900">Editar</a>

    <x-jet-dialog-modal wire:model="open">
        <x-slot name="title">
            Editar empleado: {{ $employee->name }}
        </x-slot>
        <x-slot name="content">
            <div class="mb-4">
                <x-jet-label>Nombre del empleado</x-jet-label>
                <x-jet-input id="name" class="block mt-1 w-full" type="text" wire:model.defer="employee.name" name="name" :value="old('name')" required autofocus />
                @error('employee.name') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <x-jet-label>Edad del empleado</x-jet-label>
                <x-jet-input id="age" class="appearance-none block mt-1 w-full" wire:model.defer="employee.age" type="number" name="age" :value="old('age')" required autofocus />
                @error('employee.age') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('open', false)" class="ml-4 flex items-center whitespace-nowrap">
                Cancelar
            </x-jet-secondary-button>
            <x-jet-danger-button wire:click="update" class="ml-4 flex items-center whitespace-nowrap">
                Actualizar
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
