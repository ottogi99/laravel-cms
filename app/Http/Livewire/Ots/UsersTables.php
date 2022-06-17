<?php

namespace App\Http\Livewire\Ots;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UsersTables extends Component
{
    use WithPagination;

    public $perPage = 10;
    public $search = '';
    public $orderBy = 'id';
    public $orderAsc = true;


    public function render()
    {
        return view('livewire.ots.users-tables', [
            // 'users' => User::paginate(10),
            'users' => User::search($this->search)
                        ->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')
                        ->simplePaginate($this->perPage),
        ]);
    }
}
