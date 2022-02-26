<?php

namespace App\Http\Livewire;

use App\Models\Employee;
use Livewire\Component;

class EditEmployee extends Component
{
    public $open = false;

    public $employee;

    protected $rules = [
        'employee.name' => 'required',
        'employee.age' => 'required|numeric',
    ];

    public function mount(Employee $employee)
    {
        $this->employee = $employee;
    }

    public function render()
    {
        return view('livewire.edit-employee');
    }

    public function update()
    {
        $this->validate();

        $this->employee->save();

        $this->reset(['open']);

        $this->emitTo('index-employees', 'render');
        $this->emit('alert', 'Mensaje del Sistema', 'Empleado actualizado correctamente', 'success');
    }
}
