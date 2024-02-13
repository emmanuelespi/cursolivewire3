<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;

class UsersComponent extends Component
{
    public $title;
    public $name;
    public $email;
    public $password;

    public function createUser()
    {
        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password
        ]);
    }
    public function render()
    {
        $this->title = "Usuario";
        $usersCount = User::count();
        $users = User::all()->reverse();

        return view('livewire.users-component',[
            'title' => $this->title,
            'usersCount' => $usersCount,
            'users' => $users
        ]);
    }
}
