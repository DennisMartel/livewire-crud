<div>
    <x-table-responsive>
        <div class="px-6 py-2 border-b flex items-center justify-between bg-white">
            <div>
                <div class="flex justify-between items-center">
                    Mostrar
                    <div class="xl:w-24 px-2">
                        <select wire:model="perPage" class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example">
                            <option selected value="15">15</option>
                            <option value="25">25</option>
                            <option value="35">35</option>
                            <option value="50">50</option>
                        </select>
                    </div>
                    Entradas
                </div>
            </div>
            <div class="w-full mx-8">
                <div class="pt-2 relative mx-auto text-gray-600 w-full">
                    <x-jet-input type="text" class="w-full" wire:model="q" placeholder="Buscar empleado"></x-jet-input>
                    <!-- <input class="w-full border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none" type="search" name="search" placeholder="Search"> -->
                    <button type="submit" class="absolute right-0 top-0 mt-5 mr-4">
                        <svg class="text-gray-600 h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve" width="512px" height="512px">
                            <path d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z" />
                        </svg>
                    </button>
                </div>
            </div>
            @livewire('create-employee')
        </div>
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Edad</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200" wire:init="dataLoaded">
                @forelse($employees as $employee)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="text-sm font-medium text-gray-900">{{ $employee->id }}</div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="text-sm font-medium text-gray-900">{{ $employee->name }}</div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm font-bold text-gray-900">{{ $employee->age }} años</div>
                    </td>
                    <td class="flex items-center px-6 py-4 whitespace-nowrap text-md font-medium">
                        @livewire('edit-employee', ['employee' => $employee], key($employee->id))
                        {{-- <a class="cursor-pointer text-red-600 hover:text-red-900 ml-4" wire:click="$emit('deleteEmployee', {{ $employee->id }})">Borrar</a> --}}
                        <a class="cursor-pointer text-red-600 hover:text-red-900 ml-4" wire:click="delete({{ $employee->id }})">Borrar</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="px-6 py-4 whitespace-nowrap text-center">
                        <div class="flex items-center justify-center space-x-2 animate-bounce">
                            <div class="w-4 h-4 bg-blue-400 rounded-full"></div>
                            <div class="w-4 h-4 bg-blue-400 rounded-full"></div>
                            <div class="w-4 h-4 bg-blue-400 rounded-full"></div>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>

        @if(count($employees) > 0)
        @if($employees->hasPages())
            <div class="px-4 py-4">
                {{ $employees->links() }}
            </div>
        @endif
        @endif
    </x-table-responsive>

    @push('scripts')
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script>
            Livewire.on('deleteEmployee', employeeId => {
                Swal.fire({
                    title: 'Mensaje del Sistema?',
                    text: "Estás seguro de eliminar el empleado!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sí, deseo borrarlo!'
                }).then((result) => {
                    if (result.isConfirmed) {

                        Livewire.emitTo('index-employees', 'delete', employeeId)

                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                    }
                })
            })
        </script>
    @endpush
</div>

