<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;

class ListUsers extends Component
{
    use WithPagination;
    public $search='';
    public $numberRows='5';

    #[On('createUser')]
    public function updateList($user = null){
        //dump($user);
        $this->user;
    }

    /* public function placeholder()
    {
        return view('placeholder');
    } */

    #[Computed()]
    public function users()
    {
        return User::where('name','like','%'.$this->search.'%')
        ->orderBy('id','desc')
        ->paginate($this->numberRows);
    }

    public function mount($search)
    {
        $this->search = $search;
    }
}
