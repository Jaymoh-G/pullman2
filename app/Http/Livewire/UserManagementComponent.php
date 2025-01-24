<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Request;
use Livewire\Component;
use Illuminate\Support\Str;
use App\Mail\WelcomeNewUser;
use Livewire\WithPagination;
use App\Mail\generalMailSend;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserManagementComponent extends Component
{
    public $sortBy = "name";
    public $sortDirection = 'asc';
    public $perPage = 10;
    public $search = '';

    public $editModal = false;
    public $deleteModal = false;

    public $editingUser;
    public $deleteUser;
    public $password;

    use WithPagination;
    public function render()
    {
        if (!$this->editModal) {
            $this->editingUser = [];
        }
        $users = User::query()->search($this->search)->orderBy($this->sortBy, $this->sortDirection)->paginate($this->perPage);
        return view('livewire.user-management-component', ['users' => $users])->layout('layouts.base');
    }
    protected function fetchUsers()
    {
        $users = User::search($this->search)->orderBy($this->sortBy, $this->sortDirection)->paginate($this->perPage);
    }
    public function sortBy($field)
    {
        if ($this->sortDirection == 'asc') {
            $this->sortDirection = "desc";
        } else {
            $this->sortDirection = 'asc';
        }
        return $this->sortBy = $field;
    }
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function createUser()
    {
        $this->editModal = true;
    }

    public function editUser($user)
    {
        $this->editingUser = $user;
        $this->editModal = true;
    }
    public function saveUser()
    {

        $validated = $this->validate([
                'editingUser.name' => 'required',
                'editingUser.telephone' => 'required|digits:10',
                'editingUser.email' => 'required|email',
                'editingUser.utype' => 'required',
            ],[
                'editingUser.name.required' => 'Name is required',
                'editingUser.telephone.required' => 'Telephone is required',
                'editingUser.telephone.digits' => 'Telephone must be 10 digits',
                'editingUser.email.required' => 'Email is required',
                'editingUser.email.email' => 'Email must be valid',
                'editingUser.utype.required' => 'User type is required',
            ]
        );


        if (!empty($this->editingUser['id'])) {            
            $user = User::find($this->editingUser['id']);
            $user->update($validated['editingUser']);
        } else {
            $this->validate([
                'editingUser.email' => 'unique:users,email',
            ],[
                'editingUser.email.unique' => 'Email has been taken'
            ]);
            $password = Str::random(8);
            $validated['editingUser']['password'] = bcrypt($password);
            User::create($validated['editingUser']);
        }
        //send an email
        Mail::to($validated['editingUser']['email'])->send(new WelcomeNewUser($validated['editingUser']['name'], $validated['editingUser']['email'], $password));
        $validated['editingUser']['name'] = "";
        $validated['editingUser']['telephone'] = "";
        $validated['editingUser']['email'] = "";
        $validated['editingUser']['utype'] = "";
        $this->fetchUsers();
        $this->closeModal();
    }
    public function closeModal()
    {
        $this->editModal = $this->deleteModal = false;
    }
    public function confirmDelete($user_id)
    {
        $this->deleteModal = true;
        $this->deletingUserId = $user_id;
    }
    public function deleteUser()
    {
        if (!empty($this->deletingUserId)) {
            User::destroy($this->deletingUserId);
        }
        $this->deletingProductId = null;
        $this->fetchUsers();
        $this->closeModal();
    }
}
