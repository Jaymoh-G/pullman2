<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class EditUserComponent extends Component
{
    public $name, $telephone, $email, $user_id, $utype;
    // public $updateMode = false;

    private function resetInputFields()
    {
        $this->name = '';
        $this->telephone = '';
        $this->email = '';
        $this->utype = '';
    }
    public function editUser($id)
    {
        $user = User::where($id)->first();
        $this->user_id = $id;
        $this->telephone = $user->telephone;
        $this->email = $user->email;
        $this->utype = $user->utype;
    }

    public function update()
    {
        $validatedDate = $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'telephone' => 'required|numeric',
            'utype' => 'required'

        ]);

        if ($this->user_id) {
            $user = User::findOrFail($this->user_id);
            $user->update([
                'name' => $this->name,
                'email' => $this->email,
                'telephone' => $this->telephone,
                'utype' => $this->utype,
            ]);

            session()->flash('message', 'Users Updated Successfully.');
            $this->resetInputFields();
        }
    }
    public function render()
    {
        return view('livewire.edit-user-component')->layout('layouts.base');
    }
}
