<?php

namespace App\Http\Livewire;

use App\Models\Employee;
use Livewire\Component;

class CreateEmployee extends Component
{
    public $open = false;
    public $name, $age;

    protected $rules = [
        'name' => 'required',
        'age' => 'required|numeric',
    ];

    public function render()
    {
        return view('livewire.create-employee');
    }

    public function save()
    {
        $this->validate();

        Employee::create([
            'name' => $this->name,
            'age' => $this->age,
        ]);

        $this->reset(['open', 'name', 'age']);

        $this->emitTo('index-employees', 'render');
        $this->emit('alert', 'Mensaje del Sistema', 'Empleado registrado correctamente', 'success');
    }
}
