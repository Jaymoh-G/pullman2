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
                                <li class="breadcrumb-item active">Pages</li>
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
                                <h4>All pages</h4>
                                <a class="btn btn-sm btn-default float-right header-button-icons" href="{{ route('admin.page.create')}}">                                       
                                    Add Page
                                </a>
                                <a class="btn btn-sm btn-secondary float-right header-button-icons" href="{{route('admin.whatWeDo.list')}}">
                                    What we do
                                </a>
                                <a class="btn btn-sm btn-primary float-right header-button-icons" href="{{route('admin.homepage.slider.list')}}">
                                    Slider
                                </a>
                                <a class="btn btn-sm btn-primary float-right header-button-icons" href="{{route('admin.partner.list')}}">
                                    Partners
                                </a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table student-data-table m-t-20">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Created by</th>
                                                <th class="action">
                                                  Action
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($pages as $page)
                                            <tr>
                                                <td>{{$page->name}}</td>
                                                <td>{{$page->created_by}}</td>
                                               
                                                <td>
                                                    <a
                                                        href={{'/admin/page/create?id='.$page->id}}
                                                        class="btn btn-success btn-sm rounded-0"
                                                        data-toggle="tooltip"
                                                        data-placement="top"
                                                        title="Edit"
                                                    >
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <a
                                                        href={{'/admin/page/section/list?pageId='.$page->id}}
                                                        class="btn btn-success btn-sm rounded-0"
                                                        data-toggle="tooltip"
                                                        data-placement="top"
                                                        title="Sections"
                                                    >
                                                        <i class="fa fa-plus"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            @empty
                                                <p>No pages</p>
                                            @endforelse
                                        </tbody>

                                    </table>
                                </div>
                            </div>
                            <div class="modal {{ $showDeleteMessage ? 'is-active' : '' }}">
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
                                        You are about to delete page {{$this->pageId}}. Are you sure about this?

                                        <footer class="modal-card-foot">
                                            <button class="button is-danger" wire:click="delete({{$this->pageId}})">
                                                Yes
                                            </button>
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
