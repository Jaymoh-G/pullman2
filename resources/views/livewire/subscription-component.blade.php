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
                                <li class="breadcrumb-item active">
                                    Subscription
                                </li>
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
                                <h4>Subscribers</h4>
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
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Category</th>
                                                <th>Subscription Date</th>                                                
                                                <th class="create">
                                                    <a
                                                        href="{{
                                                            route(
                                                                'newsletter.send.mass'
                                                            )
                                                        }}"
                                                        ><button
                                                            class="
                                                                btn btn-default
                                                            "
                                                        >
                                                            Send newsletter
                                                        </button>
                                                    </a>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($subscriptions as
                                            $subscriptions)
                                            <tr>
                                                <td>
                                                    {{$subscriptions->name}}
                                                </td>
                                                <td>
                                                    {{$subscriptions->email}}
                                                </td>                                                
                                                <td>
                                                    {{$subscriptions->category}}
                                                </td>
                                                <td>
                                                    {{$subscriptions->created_at}}
                                                </td>
                                                <td>
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
                                                        wire:click="confirmDelete({{ $subscriptions->id }})"
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
                                            You are about to delete a
                                            Subscriber, Are you sure about this?

                                            <footer class="modal-card-foot">
                                                <button
                                                    class="button is-danger"
                                                    wire:click="deleteSubscription"
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
