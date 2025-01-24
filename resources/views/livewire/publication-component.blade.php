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
                                <li class="breadcrumb-item active">Our Work</li>
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
                                <h4>Our Work</h4>
                                <a
                                    href="{{route('admin.publications.create')}}"
                                    class="btn btn-sm btn-default float-right header-button-icons"
                                >
                                    Add Our Work
                                </a>
                                <a
                                    href="{{route('admin.publications.category.list')}}"
                                    class="btn btn-sm btn-success float-right header-button-icons"
                                >
                                    Categories
                                </a>

                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table student-data-table m-t-20">
                                        <thead>
                                            <tr>
                                                <th>Category</th>
                                                <th>Title</th>
                                                <th>Description</th>
                                                <th>File</th>
                                                <th>Image</th>
                                                <th class="create">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($publications as $publication)
                                            <tr>
                                                <td>
                                                    @if($publication->category_names)
                                                        @foreach(unserialize($publication->category_names) as $name)
                                                            {{ $name }}
                                                            @if(!$loop->last)
                                                                ,
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                </td>
                                                <td>{{$publication->title}}</td>
                                                <td>{!!$publication->description!!}</td>
                                                <td>
                                                    @if($publication->category == 'video')
                                                        {{$publication->video_link}}
                                                    @elseif($publication->category == 'image')
                                                        <a href="{{'/'.$publication->file_path}}" target="_blank"><img src="{{'/'.$publication->file_path}}" alt={{$publication->title}} width="50" height="50" /></a>
                                                    @else
                                                        <a href="{{'/'.$publication->file_path}}" target="_blank"><i class="fa fa-download" aria-hidden="true"></i></a>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a
                                                        href="{{'/'.$publication->publication_image}}"
                                                        target="_blank"
                                                        ><img
                                                            src="{{'/'.$publication->publication_image}}"
                                                            alt="{{$publication->title}}"
                                                            width="50"
                                                            height="50"
                                                    /></a>
                                                </td>
                                                <td>
                                                    <a
                                                        href={{$publication->category == "video" ? '/admin/our-work/video/create?id='.$publication->id : '/admin/our-work/create?id='.$publication->id}}
                                                        class="btn btn-success btn-sm rounded-0"
                                                        data-toggle="tooltip"
                                                        data-placement="top"
                                                        title="Edit"
                                                    >
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <a
                                                        href={{'/admin/our-work/quoteCard/list?id='.$publication->id}}
                                                        class="btn btn-success btn-sm rounded-0"
                                                        data-toggle="tooltip"
                                                        data-placement="top"
                                                        title="Quote cards"
                                                    >
                                                        <i class="fa fa-quote-left"></i>
                                                    </a>
                                                    <a
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
                                                        wire:click="showDeleteModal({{ $publication->id }})"
                                                    >
                                                        <i
                                                            class="fa fa-trash"
                                                        ></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>

                                    </table>
                                    {{ $publications->links() }}
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
                                        You are about to delete publication {{$this->publicationId}}. Are you sure about this?

                                        <footer class="modal-card-foot">
                                            <button class="button is-danger" wire:click="delete({{$this->publicationId}})">
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
