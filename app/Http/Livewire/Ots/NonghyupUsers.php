<?php

namespace App\Http\Livewire\Ots;

use App\Models\Nonghyup;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\UserPermission;

class NonghyupUsers extends Component
{
    use WithPagination;

    public $modalFormVisible = false;
    public $modalConfirmDeleteVisible = false;
    public $modelId;

    public $selectedNonghyupId;
    public $selectedUserId;

    public $region;
    public $nonghyupList;
    public $users;

    public function rules()
    {
        return [
            'region' => 'required',
            'selectedNonghyupId' => 'required',
            'selectedUserId' => 'required',
        ];
    }

    public function mount()
    {
        // $this->nonghyupList = Nonghyup::all();
        // $this->users = User::all();
    }

    public function updatedRegion($region)
    {
        // $this->nonghyupList = Nonghyup::nonghyupRegionList()[$region];
        $this->nonghyupList = Nonghyup::where('region', '=', $region)->get();
        $this->users = User::all();
    }

    public function create()
    {
        $this->validate();

        User::find($this->selectedUserId)
            ->update(['nonghyup_id' => $this->selectedNonghyupId]);

        $this->modalFormVisible = false;
        $this->reset();
    }

    public function read()
    {
        return User::paginate(20);
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
        // $data = User::find($this->modelId);
        $data = User::find($this->selectedUserId);
        $this->region = $data->region;
        $this->nonghyupList = $data->role;
        $this->users = $data->role;
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
        return view('livewire.ots.nonghyup-users', [
            'data' => $this->read(),
        ]);
    }
}
