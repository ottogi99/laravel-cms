<?php

namespace App\Http\Livewire\Ots;

use App\Models\Nonghyup;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Users extends Component
{
    use WithPagination;

    public $modalFormVisible = false;
    public $modalConfirmDeleteVisible = false;

    public $modelId;
    public $name;
    public $email;
    public $role;
    public $region;
    public $nonghyup;
    public $nonghyupList;


    public function updatedRegion($region)
    {
        $this->nonghyupList = User::userNonghyupList()[$region];
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required',
            // 'region' => 'required',
            // 'role' => 'required',
        ];
    }

    public function create()
    {
        $this->validate();
        User::create($this->modelData());
        $this->modalFormVisible = false;
        $this->reset();
    }

    public function read()
    {
        return User::paginate(5);
    }

    public function update()
    {
        $this->validate();
        $result = User::find($this->modelId)->update($this->modelData());
        $this->modalFormVisible = false;
    }

    public function delete()
    {
        User::destroy($this->modelId);
        $this->modalConfirmDeleteVisible = false;
        $this->resetPage();
    }

    public function createShowModal()
    {
        $this->resetValidation();
        $this->reset();
        $this->modalFormVisible = true;
    }

    public function updateShowModal($id)
    {
        $this->resetValidation();
        $this->reset();
        $this->modalFormVisible = true;
        $this->modelId = $id;
        $this->loadModel();
    }

    public function deleteShowModal($id)
    {
        $this->modelId = $id;
        $this->modalConfirmDeleteVisible = true;
    }

    public function loadModel()
    {
        $data = User::find($this->modelId);
        $this->name = $data->name;
        $this->email = $data->email;
        $this->role = $data->role;
        $this->region = $data->region;
    }

    public function modelData()
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'role' => $this->role,
            'region' => $this->region,
        ];
    }

    public function render()
    {
        return view('livewire.ots.users', [
            'data' => $this->read(),
        ]);
    }
}
