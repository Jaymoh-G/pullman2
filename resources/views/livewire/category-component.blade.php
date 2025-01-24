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
                                    Categories
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
                                <h4>Categories</h4>
                            </div>
                            @if(Session::has('message'))
                            <div class="alert alert-success" role="alert">
                                {{Session::get('message')}}
                            </div>
                            @endif
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table
                                        class="table student-data-table m-t-20"
                                    >
                                        <thead>
                                            <tr>
                                                <th>Category</th>
                                                <th>Sub Category</th>
                                                <th>Date created</th>
                                                <th class="create">
                                                    <a
                                                        href="{{
                                                            route(
                                                                'admin.blog.categories.create'
                                                            )
                                                        }}"
                                                        class="btn btn-default"
                                                    >
                                                        Add Category
                                                    </a>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($categories as $category)
                                            <tr>
                                                <td>{{$category->name}}</td>
                                                <td>
                                                    <ul>
                                                        @foreach($category->subCategories
                                                        as $category)
                                                        <li>
                                                            {{$category->name }}
                                                            <a
                                                                href=""
                                                                class="btn btn-success btn-sm rounded-0"
                                                                data-toggle="tooltip"
                                                                data-placement="top"
                                                                title="Edit"
                                                            >
                                                                <i
                                                                    class="fa fa-edit"
                                                                ></i>
                                                            </a>
                                                            <button
                                                                class="btn btn-danger btn-sm rounded-0"
                                                                type="button"
                                                                data-toggle="tooltip"
                                                                data-placement="top"
                                                                title="Delete"
                                                                wire:click="showDeleteModal({{ $category->id }})"
                                                            >
                                                                <i
                                                                    class="fa fa-trash"
                                                                ></i>
                                                            </button>
                                                        </li>
                                                        @endforeach
                                                    </ul>
                                                </td>
                                                <td>
                                                    {{$category->created_at}}
                                                </td>
                                                <td>
                                                    <a
                                                        href="{{
                                                            route(
                                                                'admin.blog.categories.create'
                                                            )
                                                        }}?id={{$category->id}}"
                                                        class="btn btn-success btn-sm rounded-0"
                                                        data-toggle="tooltip"
                                                        data-placement="top"
                                                        title="Edit"
                                                    >
                                                        <i
                                                            class="fa fa-edit"
                                                        ></i>
                                                    </a>
                                                    <button
                                                        class="btn btn-danger btn-sm rounded-0"
                                                        type="button"
                                                        data-toggle="tooltip"
                                                        data-placement="top"
                                                        title="Delete"
                                                        wire:click="showDeleteModal({{ $category->id }})"
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
                            <div
                                class="modal {{
                                    $showDeleteMessage ? 'is-active' : ''
                                }}"
                            >
                                <div class="modal-background"></div>
                                <div class="modal-card">
                                    <header class="modal-card-head">
                                        <p class="modal-card-title">Delete</p>
                                        <button
                                            wire:click="closeModal"
                                            class="delete"
                                            aria-label="close"
                                        ></button>
                                    </header>
                                    <section class="modal-card-body">
                                        You are about to delete category
                                        {{$this->categoryId?$this->getCategoryName($this->categoryId):''












                                        }}. Are you sure about this?

                                        <footer class="modal-card-foot">
                                            <button
                                                class="button is-danger"
                                                wire:click="delete"
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
                    <!-- /# column -->
                </div>
            </section>
        </div>
    </div>
</div>
