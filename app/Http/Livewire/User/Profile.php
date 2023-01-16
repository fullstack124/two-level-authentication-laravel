<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Profile extends Component
{
    public $is_clicked=false;
    public function render()
    {
        return view('livewire.user.profile')->layout('layouts.app');
    }


    public function logout()
    {
        $this->is_clicked=true;
        $user = User::findOrFail(auth()->id());
        $user->code_status = 0;
        $user->save();
        Auth::logout();
        return redirect(route('login'));
        $this->is_clicked=false;
        
    }
}
