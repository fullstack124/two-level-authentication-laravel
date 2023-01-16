<?php

namespace App\Http\Livewire\User\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{

    public $email, $pass;
    public $is_clicked=false;
    public function render()
    {
        return view('livewire.user.auth.login')->layout('layouts.auth');
    }

    public function login()
    {
        $this->validate([
            'email' => 'required|email',
            'pass' => 'required'
        ]);
        $this->is_clicked=true;
        $user = Auth::attempt(['email' => $this->email, 'password' => $this->pass]);
        if ($user) {
            $this->dispatchBrowserEvent(
                'alert',
                ['type' => 'success',  'message' => 'Login Successfully']
            );
            return redirect(route('pattern'));
        } else {
            $this->dispatchBrowserEvent(
                'alert',
                ['type' => 'error',  'message' => 'Invalid Email and password']
            );

            $this->email = "";
            $this->pass = "";
            $this->is_clicked=false;
        }
    }
}
