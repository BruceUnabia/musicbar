<?php

namespace App\Http\Livewire\Auth;


use Livewire\Component;
use App\Models\User;

class Login extends Component
{
    public $email, $password, $errorMsg;

    public function submit(){
        $this->validate([
            'email'     => 'required|email',
            'password'  => 'required|string'
        ]);

        $user = User::where('email', $this->email)->first();

        if(!$user){
            $this->errorMsg = "Account does not exist.";
            $this->email = '';
            $this->password = '';
        }else{
            $login = auth()->attempt([
                'email' => $this->email,
                'password' => $this->password
            ]);

            if(!$login){
                $this->errorMsg = 'Invalid User';
                $this->email = '';
               $this->password = '';
            }else{
                return redirect('/');
            }
        }
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
