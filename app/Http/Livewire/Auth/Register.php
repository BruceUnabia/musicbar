<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;
use App\Models\User;

class Register extends Component
{
    public $name, $email, $password, $password_confirmation;

    public function submit(){
        $this->validate([
            'name'        => 'required|string',
            'email'       => 'required|email|unique:users',
            'password'    => 'required|confirmed|string|min:4'
        ]);

        User::create([
            'name'        => $this->name,
            'email'       => $this->email,
            'password'    => bcrypt($this->password)
        ]);

        return redirect('/login')->with('message', 'Account created Successfully.');
    }

    public function render()
    {
        return view('livewire.auth.register');
    }
}
