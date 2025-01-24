<div class="content-wrap">
    <div class="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 p-r-0 title-margin-right"></div>
                <!-- /# column -->
                <div class="col-lg-4 p-l-0 title-margin-left">
                    <div class="page-header">
                        <div class="page-title">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="#">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active">Users</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- /# column -->
            </div>
            <!-- /# row -->
            <section id="main-content">
                <div class="row">
                    <!-- /# column -->
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-title">
                                <h4>Users</h4>
                                <div class="row mb-4">
                                    <div class="col form-inline">
                                        Per Page: &nbsp;
                                        <select
                                            wire:model="perPage"
                                            class="form-control"
                                        >
                                            <option>5</option>
                                            <option>10</option>
                                            <option>20</option>
                                            <option>50</option>
                                        </select>
                                    </div>

                                    <div class="col">
                                        <input
                                            wire:model.debounce.300ms="search"
                                            class="form-control"
                                            type="text"
                                            placeholder="Search User..."
                                        />
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table
                                        class="table student-data-table m-t-20"
                                    >
                                        <thead>
                                            <tr>
                                                <th
                                                    wire:click="sortBy('name')"
                                                    style="cursor: pointer"
                                                >
                                                    Name
                                                    @include('partials.sort-icon',['field'=>'name'])
                                                </th>
                                                <th
                                                    wire:click="sortBy('email')"
                                                    style="cursor: pointer"
                                                >
                                                    Email
                                                    @include('partials.sort-icon',['field'=>'email'])
                                                </th>
                                                <th
                                                    wire:click="sortBy('telephone')"
                                                    style="cursor: pointer"
                                                >
                                                    Phone Number
                                                    @include('partials.sort-icon',['field'=>'telephone'])
                                                </th>
                                                <th
                                                    wire:click="sortBy('utype')"
                                                    style="cursor: pointer"
                                                >
                                                    Role
                                                    @include('partials.sort-icon',['field'=>'utype'])
                                                </th>
                                                <th
                                                    wire:click="sortBy('created_at')"
                                                    style="cursor: pointer"
                                                >
                                                    Date of Registration
                                                    @include('partials.sort-icon',['field'=>'created_at'])
                                                </th>
                                                <th class="create">


                                                       <button
                                                            class="
                                                                btn btn-default
                                                            "
                                                                wire:click="createUser"
                                                        >
                                                            Add User
                                                        </button>

                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($users as $user)
                                            <tr>
                                                <td>{{$user->name}}</td>
                                                <td>{{$user->email}}</td>
                                                <td>{{$user->telephone}}</td>
                                                <td>{{$user->utype}}</td>
                                                <td>{{$user->created_at}}</td>
                                                <td>
                                                    <button
                                                        class="
                                                            btn
                                                            btn-success
                                                            btn-sm
                                                            rounded-0
                                                        "
                                                        wire:click="editUser({{
                                                            $user
                                                        }})"
                                                        type="button"
                                                        data-toggle="tooltip"
                                                        data-placement="top"
                                                        title="Edit"
                                                    >
                                                        <i
                                                            class="fa fa-edit"
                                                        ></i>
                                                    </button>
                                                    <button
                                                        wire:click="confirmDelete({{$user['id']}})"
                                                        class="
                                                            btn
                                                            btn-danger
                                                            btn-sm
                                                            rounded-0
                                                        "
                                                        type="button"
                                                        data-toggle="tooltip"
                                                        data-placement="top"
                                                        title="Delete"
                                                    >
                                                        <i
                                                            class="fa fa-trash"
                                                        ></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div>
                                        <p>{{$users->links()}}</p>
                                    </div>
                                </div>
                            </div>
                            <!-- Confirm Delete Modal -->

                            <div class="modal {{$deleteModal?'is-active':''}}">
  <div class="modal-background"></div>
  <div class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title">Delete</p>
      <button wire:click="closeModal" class="delete" aria-label="close"></button>
    </header>
    <section class="modal-card-body">
    Are you sure you want to delete?

    <footer class="modal-card-foot">
      <button class="button is-danger" wire:click="deleteUser">yes</button>
      <button class="button" wire:click="closeModal">Cancel</button>
    </footer>
       </section>
  </div>
</div>

<!-- User Edit Modal -->
                            @if(!empty($editModal))
                            <div  class="modal {{
                                    $editModal ? 'is-active' : ''
                                }}"
                                id="editModal">
                            <div class="modal-background"></div>
                            <div class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title">User's Form</p>
      <button wire:click="closeModal" class="delete" aria-label="close"></button>
    </header>
    <section class="modal-card-body">
      <form wire:submit.prevent="saveUser">


<div class="field">
  <label class="label">Name</label>
  <div class="control has-icons-left has-icons-right">
    <input wire:model.lazy="editingUser.name" class="input is-success" type="text" placeholder="{First name} {last name}" value="">
    <span class="icon is-small is-left">
      <i class="fas fa-user"></i>
    </span>
    <span class="icon is-small is-right">
      <i class="fas fa-check"></i>
    </span>
  </div>
  @error('editingUser.name')
  <p class="help is-danger">{{$message}}</p>
  @enderror
</div>

<div class="field">
  <label class="label">Phone Number</label>
  <div class="control has-icons-left has-icons-right">
    <input wire:model.lazy="editingUser.telephone" class="input is-primary" type="text" placeholder="Telephone" value="">
    <span class="icon is-small is-left">
      <i class="fas fa-phone"></i>
    </span>
    <span class="icon is-small is-right">
      <i class="fas fa-check"></i>
    </span>
  </div>
  @error('editingUser.telephone')
  <p class="help is-danger">{{$message}}</p>
  @enderror
</div>
<div class="field">
  <label class="label">Email</label>
  <div class="control has-icons-left has-icons-right">
    <input wire:model.lazy="editingUser.email" class="input is-primary" type="email" placeholder="Email Address" value="">
    <span class="icon is-small is-left">
      <i class="fas fa-envelope"></i>
    </span>
    <span class="icon is-small is-right">
      <i class="fas fa-check"></i>
    </span>
  </div>
    @error('editingUser.email')

  <p class="help is-danger">{{$message}}</p>
  @enderror
</div>


<div class="field">
  <label class="label">Role</label>
  <div class="control ">
    <div class="select">
      <select wire:model.lazy="editingUser.utype">
        <option>Select Role</option>
        <option>User</option>
        <option>Editor</option>
        <option>Admin</option>
      </select>
    </div>
  </div>
  @error('editingUser.utype')

  <p class="help is-danger">{{$message}}</p>
  @enderror
</div>




    <footer class="modal-card-foot">
      <button class="button is-success">Save changes</button>
      <button wire:click="closeModal" class="button">Cancel</button>
    </footer>

      </form>
        </section>
  </div>
</div>


                            </div>
                            @endif
                        </div>
                        <!-- /# column -->
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
