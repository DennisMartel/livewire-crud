<?php

namespace App\Http\Livewire;

use App\Models\Employee;
use Livewire\Component;
use Livewire\WithPagination;

class IndexEmployees extends Component
{
    use WithPagination;

    public $loadedData = false;
    public $q = "";
    public $perPage = "15";

    protected $listeners = ['render', 'delete'];

    protected $queryString = [
        'q' => ['except' => ''],
        'perPage' => ['except' => '15'],
    ];

    public function dataLoaded()
    {
        $this->loadedData = true;
    }

    public function render()
    {
        if ($this->loadedData) {
            $employees = Employee::orderBy('id', 'DESC')->searching($this->q)->paginate($this->perPage, ['*'], 'p');
        } else {
            $employees = [];
        }

        return view('livewire.index-employees', compact('employees'));
    }

    public function updatingQ()
    {
        $this->resetPage('p');
    }

    public function updatingPerPage()
    {
        $this->resetPage('p');
    }

    public function delete(Employee $employee)
    {
        $employee->delete();
    }
}
