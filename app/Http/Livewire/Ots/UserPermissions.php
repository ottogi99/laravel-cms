<?php

namespace App\Http\Livewire\Ots;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\UserPermission;

class UserPermissions extends Component
{
    use WithPagination;

    public $modalFormVisible = false;
    public $modalConfirmDeleteVisible = false;
    public $modelId;

    public $role;
    public $routeName;

    public function rules()
    {
        return [
            'role' => 'required',
            'routeName' => 'required',
        ];
    }

    public function create()
    {
        $this->validate();
        UserPermission::create($this->modelData());
        $this->modalFormVisible = false;
        $this->reset();
    }

    public function read()
    {
        return UserPermission::paginate(5);
    }

    public function update()
    {
        $this->validate();
        UserPermission::find($this->modelId)->update($this->modelData());
        $this->modalFormVisible = false;
    }

    public function delete()
    {
        UserPermission::destroy($this->modelId);
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
        $data = UserPermission::find($this->modelId);
        $this->role = $data->role;
        $this->routeName = $data->route_name;
    }

    public function modelData()
    {
        return [
            'role' => $this->role,
            'route_name' => $this->routeName,
        ];
    }

    public function render()
    {
        return view('livewire.ots.user-permissions', [
            'data' => $this->read(),
        ]);
    }
}
