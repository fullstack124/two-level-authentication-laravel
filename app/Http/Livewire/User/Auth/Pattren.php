<?php

namespace App\Http\Livewire\User\Auth;

use App\Models\User;
use Livewire\Component;

class Pattren extends Component
{
    public $code1;
    public $code2;
    public $code3;
    public $code4;
    public $is_clicked=false;
    // public $show_code;

    public function mount()
    {
        $user = User::findOrFail(auth()->id());
        $user->code = rand(1000, 9999);
        $user->save();
    }


    public function render()
    {
        return view('livewire.user.auth.pattren')->layout('layouts.auth');
    }

    public function verify()
    {
        $user = User::findOrFail(auth()->id());
        $this->is_clicked=true;
        if ($this->code1 == "" || $this->code2 == "" || $this->code3 == "" || $this->code4 == "") {
            $this->dispatchBrowserEvent(
                'alert',
                ['type' => 'error',  'message' => 'Please fill the field']
            );
            $this->code1 = "";
            $this->code2 = "";
            $this->code3 = "";
            $this->code4 = "";
        } else {
            $confirm_code = $this->code1 . "" . $this->code2 . "" . $this->code3 . "" . $this->code4;
            if ($user->code  == $confirm_code) {
                $this->dispatchBrowserEvent(
                    'alert',
                    ['type' => 'success',  'message' => 'Verification Successfully']
                );
                $user->code_status = 1;
                $user->save();
                return redirect(route('profile'));
                $this->code1 = "";
                $this->code2 = "";
                $this->code3 = "";
                $this->code4 = "";
            } else {
                $this->dispatchBrowserEvent(
                    'alert',
                    ['type' => 'error',  'message' => 'Invalid Verification']
                );
                $user1 = User::findOrFail(auth()->id());
                $user1->code = rand(1000, 9999);
                $user1->save();
                $this->code1 = "";
                $this->code2 = "";
                $this->code3 = "";
                $this->code4 = "";
            }
        }
        $this->is_clicked=false;
    }
}
