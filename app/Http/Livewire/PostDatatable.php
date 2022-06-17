<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;

class PostDatatable extends Component
{
    use WithPagination;
    public $headers;
    public $searchTerm;
    public $sortColumn = 'created_at';
    public $sortDirection = 'asc';

    private function headerConfig()
    {
        return [
            'id' => '#',
            'name' => 'Name',
            'role' => 'Role',
            'region' => 'Region',
            'nonghyup' => 'Nonghyup',
            // 'nonghyup' => [
            //     'label' => '농협',
            //     'func' => function ($value) {
            //         return isset($value) ? $value->name : '';
            //     }
            // ],
            'created_at' => 'Created_At'
        ];
    }

    public function mount()
    {
        $this->headers = $this->headerConfig();
    }

    // public function updated()
    // {
    //     $this->headers = $this->headerConfig();
    // }

    public function hydrate()
    {
        $this->headers = $this->headerConfig();
    }

    public function sort($column)
    {
        $this->sortColumn = ($column == 'nonghyup') ? 'nonghyup_id' : $column;

        $this->sortDirection = $this->sortDirection == 'asc' ? 'desc' : 'asc';
    }

    public function resultData()
    {
        return User::where(function ($query) {
            $query->where('name', 'like', '%'.$this->searchTerm.'%');
        })
        ->orWhereHas('nonghyup', function ($query) {
            $query->where('name', 'like', '%'.$this->searchTerm.'%');
        })
        ->orderBy($this->sortColumn, $this->sortDirection)
        ->paginate(20);
    }


    public function render()
    {
        return view('livewire.post-datatable', [
            'data' => $this->resultData(),
        ]);
    }
}
