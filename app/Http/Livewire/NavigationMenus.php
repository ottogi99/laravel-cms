<?php

namespace App\Http\Livewire;

use App\Models\NavigationMenu;
use Laravel\Jetstream\Http\Livewire\NavigationMenu as LivewireNavigationMenu;
use Livewire\Component;
use Livewire\WithPagination;

class NavigationMenus extends Component
{
    use WithPagination;

    public $modalFormVisible = false;
    public $modalConfirmDeleteVisible = false;

    public $modelId;
    public $label;
    public $slug;
    public $sequence = 1;
    public $type = 'SidebarNav';

    public function rules()
    {
        return [
            'label' => 'required',
            'slug' => 'required',
            'sequence' => 'required',
            'type' => 'required',
        ];
    }

    public function create()
    {
        $this->validate();
        NavigationMenu::create($this->modelData());
        $this->modalFormVisible = false;
        $this->reset();
    }

    public function read()
    {
        return NavigationMenu::paginate(5);
    }

    public function update()
    {
        $this->validate();
        NavigationMenu::find($this->modelId)->update($this->modelData());
        $this->modalFormVisible = false;
    }

    public function delete()
    {
        NavigationMenu::destroy($this->modelId);
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
        $data = NavigationMenu::find($this->modelId);
        $this->label = $data->label;
        $this->slug = $data->slug;
        $this->sequence = $data->sequence;
        $this->type = $data->type;
    }

    public function modelData()
    {
        return [
            'label' => $this->label,
            'slug' => $this->slug,
            'sequence' => $this->sequence,
            'type' => $this->type,
        ];
    }

    public function render()
    {
        return view('livewire.navigation-menus', [
            'data' => $this->read(),
        ]);
    }
}
