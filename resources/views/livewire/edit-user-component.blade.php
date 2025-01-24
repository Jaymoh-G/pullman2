<div class="content-wrap">
    <div class="main">
        <div class="container-fluid">
            <div class="row">
                <!-- /# column -->
                <div class="col-lg-4 p-l-0 title-margin-left">
                    <div class="page-header">
                        <div class="page-title">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="#">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active">New User</li>
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
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-title">
                                <h4>Add User</h4>
                            </div>
                            <div class="card-body">
                                @if(Session::has('message'))
                                <div class="alert alert-success" role="alert">
                                    {{Session::get('message')}}
                                </div>
                                @endif
                                <div class="horizontal-form">
                                    <form
                                        class="form-horizontal"
                                        wire:submit.prevent="storeUser"
                                    >
                                        <div class="form-group">
                                            <div class="col-sm-10">
                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    placeholder="Name"
                                                    wire:model="name"
                                                />
                                                @error('name')
                                                <span
                                                    class="error text-danger"
                                                    >{{ $message }}</span
                                                >
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-10">
                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    placeholder="Phone Number"
                                                    wire:model="telephone"
                                                />
                                                @error('telephone')
                                                <span
                                                    class="error text-danger"
                                                    >{{ $message }}</span
                                                >
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-10">
                                                <input
                                                    type="email"
                                                    class="form-control"
                                                    placeholder="Email"
                                                    wire:model="email"
                                                />
                                                @error('email')
                                                <span
                                                    class="error text-danger"
                                                    >{{ $message }}</span
                                                >
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label
                                                class="col-sm-2 control-label"
                                                >Role</label
                                            >
                                            <div class="col-sm-10">
                                                <select
                                                    type="text"
                                                    wire:model="utype"
                                                    class="form-control"
                                                >
                                                    <option
                                                        selected="selected"
                                                        value="Subscriber"
                                                    >
                                                        Subscriber
                                                    </option>
                                                    <option value="Subscriber">
                                                        Subscriber
                                                    </option>
                                                    <option value="Editor">
                                                        Editor
                                                    </option>
                                                    <option value="Admin">
                                                        Admin
                                                    </option>
                                                </select>

                                                @error('utype')
                                                <span
                                                    class="error text-danger"
                                                    >{{ $message }}</span
                                                >
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div
                                                class="
                                                    col-sm-offset-2 col-sm-10
                                                "
                                            >
                                                <button
                                                    type="submit"
                                                    class="btn btn-default"
                                                >
                                                    Add User
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- /# column -->
                </div>
            </section>
        </div>
    </div>
</div>
