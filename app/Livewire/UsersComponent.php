<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Rule;

use Livewire\WithFileUploads;

class UsersComponent extends Component
{
    
    use WithFileUploads;
    public $title;

    

    #[Rule('required|min:5|max:255')]
    public $name;
    #[Rule('required|email|unique:users,email')]
    public $email;
    #[Rule('required|min:5')]
    public $password;
    #[Rule('nullable|image|max:1024')]
    public $image;

    public function createUser()
    {
        
        $this->validate();
        $customName = null;
        if($this->image){
            $customName = 'users/'.uniqid().'.'.$this->image->extension();
            $this->image->storeAs('public', $customName);
        }
        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
            'image' => $customName
        ]);
        session()->flash('msg','El usuario ha sido creado correctamente');
        $this->reset(['name','email','password','image']);
        $this->dispatch('createUser', $user);
    }
    public function render()
    {
        $this->title = "Usuario";
        $usersCount = User::count();
        

        return view('livewire.users-component',[
            'title' => $this->title,
            'usersCount' => $usersCount,
            
        ]);
    }
}
