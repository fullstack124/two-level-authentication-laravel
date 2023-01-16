<?php

namespace App\Http\Livewire\User\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Register extends Component
{

    public $name;
    public $email;
    public $password;
    public $is_clicked=false;
    public function render()
    {
        return view('livewire.user.auth.register')->layout('layouts.auth');
    }

    public function register()
    {
        
        $this->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ]);
        $this->is_clicked=true;
        $code = rand(9999, 1000);
        $user = new User();
        $user->name = $this->name;
        $user->email = $this->email;
        $user->password = Hash::make($this->password);
        $user->code = $code;
        $result = $user->save();
        if ($result) {
            $this->dispatchBrowserEvent(
                'alert',
                ['type' => 'success',  'message' => 'User Created Successfully!']
            );

            Auth::login($user);
            
            return redirect(route("pattern"));
        } else {
            $this->dispatchBrowserEvent(
                'alert',
                ['type' => 'error',  'message' => 'User not create successfully']
            );
        }
        $this->is_clicked=false;
    }
}
