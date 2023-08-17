<?php

namespace App\Http\Livewire\Users;


use App\Models\Role;
use App\Models\User;
use Livewire\Component;


class Register extends Component
{


    public $name;
    public $email;
    public $phone;
    public $registration_type;
    public $password;
    public $password_confirmation;


    public function attachRole(Role $role)
{
    $this->roles()->attach($role);
}


    public function submit()
    {
        $this->validate([
            'name' => 'required|string|min:3|max:255',
            'email' => 'required|email|unique:users',
            'phone' => 'required|min:10|max:10|unique:users',
            'registration_type' => 'required',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'registration_type' => $this->registration_type,
            'password' => bcrypt($this->password),
        ]);



        $user->assignRole($this->registration_type);


        auth()->login($user);

        $this->emit('registered');

        return redirect('/admin');
    }




    public function render()
    {
        return view('livewire.users.register');
    }
}
