<?php

namespace App\Http\Livewire\Ots;

use App\Models\Nonghyup;
use Livewire\Component;
use Livewire\WithPagination;

class Nonghyups extends Component
{
    use WithPagination;

    public $modalFormVisible = false;
    public $modalConfirmDeleteVisible = false;

    public $modelId;
    public $name;
    public $region;
    public $address;
    public $contact;
    public $representative;

    public function rules()
    {
        return [
            'name' => 'required',
            'region' => 'required',
            // 'address' => 'required',
            // 'contact' => 'required',
            // 'representative' => 'required',
        ];
    }

    public function create()
    {
        $this->validate();
        Nonghyup::create($this->modelData());
        $this->modalFormVisible = false;
        $this->reset();
    }

    public function read()
    {
        return Nonghyup::paginate(20);
    }

    public function update()
    {
        $this->validate();
        $result = Nonghyup::find($this->modelId)->update($this->modelData());
        $this->modalFormVisible = false;
    }

    public function delete()
    {
        Nonghyup::destroy($this->modelId);
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
        $data = Nonghyup::find($this->modelId);
        $this->name = $data->name;
        $this->region = $data->region;
        $this->address = $data->address;
        $this->contact = $data->contact;
        $this->representative = $data->representative;
    }

    public function modelData()
    {
        return [
            'name' => $this->name,
            'region' => $this->region,
            'address' => $this->address,
            'contact' => $this->contact,
            'representative' => $this->representative,
        ];
    }

    public function render()
    {
        return view('livewire.ots.nonghyups', [
            'data' => $this->read(),
        ]);
    }
}
