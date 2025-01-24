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
                                <li class="breadcrumb-item active">Album</li>
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
                                <h4>Albums</h4>
                                  <a class="action"
                                                        href="{{
                                                            route('admin.album.create')
                                                        }}"
                                                        ><button
                                                            class="
                                                                btn btn-default
                                                            "
                                                        >
                                                           Add Album
                                                        </button>
                                                    </a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table student-data-table m-t-20">
                                        <thead>
                                            <tr>
                                                <th>Title</th>
                                                <th>Created by</th>
                                                <th>Cover image</th>
                                                <th class="action">
                                                  Action
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($albums as $album)
                                            <tr>
                                                <td>{{$album->title}}</td>
                                                <td>{{$album->created_by}}</td>
                                                <td>
                                                    <a href="{{'/'.$album->cover_image}}" target="_blank"><img src="{{'/'.$album->cover_image}}" alt={{$album->title}} width="50" height="50" style="object-fit: cover" /></a>
                                                </td>
                                                <td>
                                                    <a
                                                        href={{'/admin/album/create?id='.$album->id}}
                                                        class="btn btn-success btn-sm rounded-0"
                                                        data-toggle="tooltip"
                                                        data-placement="top"
                                                        title="Edit"
                                                    >
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <a
                                                        href={{'/admin/album/photo/list?albumId='.$album->id}}
                                                        class="btn btn-success btn-sm rounded-0"
                                                        data-toggle="tooltip"
                                                        data-placement="top"
                                                        title="Photos"
                                                    >
                                                        <i class="fa fa-image"></i>
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
                                                        wire:click="showDeleteModal({{ $album->id }})"
                                                    >
                                                        <i
                                                            class="fa fa-trash"
                                                        ></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            @empty
                                                <p>No Photos</p>
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
                                        You are about to delete album {{$this->albumId}}. Are you sure about this?

                                        <footer class="modal-card-foot">
                                            <button class="button is-danger" wire:click="delete({{$this->albumId}})">
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
