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
                                    Publication categories
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
                                <h4>Publication Categories</h4>
                                <a
                                                        href="{{ route('admin.publications.category.create') }}"
                                                        class="btn btn-default"
                                                    >
                                                        Add Category
                                                    </a>
                            </div>
                            @if(Session::has('message'))
                            <div x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show">
                                <div class="alert alert-success" role="alert">
                                    {{Session::get('message')}}
                                </div>
                            </div>
                            @endif
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table
                                        class="table student-data-table m-t-20"
                                    >
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Date created</th>
                                                <th class="action">
                                                  Action
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($categories as $category)
                                            <tr>
                                                <td>{{$category->name}}</td>
                                                <td>
                                                    {{$category->created_at}}
                                                </td>
                                                <td>
                                                    <a
                                                        href={{'/admin/our-work/category/create?id='.$category->id}}
                                                        class="btn btn-success btn-sm rounded-0"
                                                        data-toggle="tooltip"
                                                        data-placement="top"
                                                        title="Edit"
                                                    >
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <button
                                                        wire:click="showDeleteModal({{
                                                            $category['id']
                                                        }})"
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
                                </div>
                            </div>

                              <!-- Confirm Delete Modal -->

                            <div class="modal {{$showDeleteMessage?'is-active':''}}">
                                <div class="modal-background"></div>
                                <div class="modal-card">
                                    <header class="modal-card-head">
                                    <p class="modal-card-title">Delete</p>
                                    <button wire:click="closeModal" class="delete" aria-label="close"></button>
                                    </header>
                                    <section class="modal-card-body">
                                    Are you sure you want to delete?

                                    <footer class="modal-card-foot">
                                    <button class="button is-danger" wire:click="deleteCategory">yes</button>
                                    <button class="button" wire:click="closeModal">Cancel</button>
                                    </footer>
                                    </section>
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
