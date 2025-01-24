<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Mail\WelcomeNewUser;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AddUserComponent extends Component
{
    public $name;
    public $telephone;
    public $email;
    public $utype;
    public $password;

    protected $rules = [
        'name' => 'required|min:6',
        'email' => 'required|email|unique:users',
        'telephone' => 'required|numeric',
        'utype' => 'required'
    ];
    private function resetInputFields()
    {
        $this->name = '';
        $this->email = '';
        $this->telephone = '';
        $this->utype = '';
        $this->password = '';
    }
    public function storeUser()
    {
        $this->validate();
        $user = new User();
        $user->name = $this->name;
        $user->telephone = $this->telephone;
        $user->email = $this->email;
        $user->utype = $this->utype;
        $this->password = $this->randomPassword();
        $user->password = Hash::make($this->password);
        $user->save();
        Mail::to($this->email)->send(new WelcomeNewUser($this->name, $this->email, $this->password));
        $this->resetInputFields();
        session()->flash('message', 'User has been added successfully!');
    }
    public function render()
    {
        $users = User::all();
        return view('livewire.add-user-component', ['users' => $users])->layout('layouts.base');
    }


    private function randomPassword() {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        return substr(str_shuffle($chars),0,8);
    
    }
}
