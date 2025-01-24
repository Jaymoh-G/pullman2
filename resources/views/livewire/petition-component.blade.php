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
                                <li class="breadcrumb-item active">Petition</li>
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
                            <div class="card-title pr">
                                <h4>Petitions</h4>
                            </div>
                            <div class="card-body">
                                @if(Session::has('message'))
                                <div class="alert alert-success" role="alert">
                                    {{Session::get('message')}}
                                </div>
                                @endif
                                <div class="table-responsive">
                                    <table
                                        class="table student-data-table m-t-20"
                                    >
                                        <thead>
                                            <tr>
                                                <th>Title</th>
                                                <th>Description</th>

                                                <th>Display status</th>
                                                <th>Link</th>
                                                <th>Created by</th>
                                                <th>Date created</th>
                                                <th>Action</th>
                                                <th class="create">
                                                    <a
                                                        href="{{
                                                            route(
                                                                'admin.petition.create'
                                                            )
                                                        }}"
                                                        ><button
                                                            class="
                                                                btn btn-default
                                                            "
                                                        >
                                                            Create
                                                        </button>
                                                    </a>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($petitions as $petition)
                                            <tr>
                                                <td>
                                                    {{$petition->title}}
                                                </td>
                                                <td>
                                                    {{$petition->description}}
                                                </td>

                                                <td>
                                                    {{$petition->display}}
                                                </td>
                                                <td>
                                                    {{$petition->petition_url}}
                                                </td>
                                                <td>
                                                    {{$petition->petitioner}}
                                                </td>
                                                <td>
                                                    {{$petition->created_at}}
                                                </td>

                                                <td>
                                                    {{$petition->updated_at}}
                                                </td>
                                                <td>
                                                    <a
                                                        href="/admin/petition/create?id={{$petition->id}}"
                                                        class="
                                                            btn
                                                            btn-success
                                                            btn-sm
                                                            rounded-0
                                                        "
                                                        data-toggle="tooltip"
                                                        data-placement="top"
                                                        title="Edit"
                                                    >
                                                        <i
                                                            class="fa fa-edit"
                                                        ></i>
                                                    </a>
                                                    <a
                                                        href="/admin/petition/subscribers?id={{$petition->id}}"
                                                        class="
                                                            btn
                                                            btn-success
                                                            btn-sm
                                                            rounded-0
                                                        "
                                                        data-toggle="tooltip"
                                                        data-placement="top"
                                                        title="View subscribers"
                                                    >
                                                        <i
                                                            class="
                                                                fa fa-registered
                                                            "
                                                        ></i>
                                                    </a>
                                                    <button
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
                                                        wire:click="confirmDelete({{ $petition->id }})"
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
                                </div>
                                <div
                                    class="modal {{
                                        $showDeleteMessage ? 'is-active' : ''
                                    }}"
                                >
                                    <div class="modal-background"></div>
                                    <div class="modal-card">
                                        <header class="modal-card-head">
                                            <p class="modal-card-title">
                                                Delete
                                            </p>
                                            <button
                                                wire:click="closeModal"
                                                class="delete"
                                                aria-label="close"
                                            ></button>
                                        </header>
                                        <section class="modal-card-body">
                                            You are about to delete a petiton,
                                            Are you sure about this?

                                            <footer class="modal-card-foot">
                                                <button
                                                    class="button is-danger"
                                                    wire:click="deletePetition"
                                                >
                                                    Yes
                                                </button>
                                                <button
                                                    class="button"
                                                    wire:click="closeModal"
                                                >
                                                    Cancel
                                                </button>
                                            </footer>
                                        </section>
                                    </div>
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
