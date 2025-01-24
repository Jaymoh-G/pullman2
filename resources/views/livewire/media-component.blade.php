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
                                <li class="breadcrumb-item active">Media</li>
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
                                <h4>Media</h4>
                                  <th class="create">
                                                    <a
                                                        href="{{
                                                            route(
                                                                'admin.media.video.create'
                                                            )
                                                        }}"
                                                        ><button
                                                            class="
                                                                btn btn-default
                                                            "
                                                        >
                                                            Add video
                                                        </button>
                                                    </a>
                                                    <a
                                                        href="{{
                                                            route(
                                                                'admin.media.create'
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
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table
                                        class="table student-data-table m-t-20"
                                    >
                                        <thead>
                                            <tr>
                                                <th>Category</th>
                                                <th>Title</th>
                                                <th>Description</th>
                                                <th>File</th>
                                              <th class="action">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($mediaItems as $media)
                                            <tr>
                                                <td>{{$media->category}}</td>
                                                <td>{{$media->title}}</td>
                                                <td>{{$media->description}}</td>
                                                <td>
                                                    @if($media->category ==
                                                    'video')
                                                    {{$media->video_link}}
                                                    @elseif($media->category ==
                                                    'image')
                                                    <a
                                                        href="{{'/'.$media->file_path}}"
                                                        target="_blank"
                                                        ><img
                                                            src="{{'/'.$media->file_path}}"
                                                            alt="{{$media->title}}"
                                                            width="50"
                                                            height="50"
                                                    /></a>
                                                    @else
                                                    <a
                                                        href="{{'/'.$media->file_path}}"
                                                        target="_blank"
                                                        ><i
                                                            class="
                                                                fa fa-download
                                                            "
                                                            aria-hidden="true"
                                                        ></i
                                                    ></a>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{$media->category == "video" ?
                                                        '/admin/media/video/create?id='.$media->id
                                                        :
                                                        '/admin/media/create?id='.$media->id}}"
                                                        class="btn btn-success
                                                        btn-sm rounded-0"
                                                        data-toggle="tooltip"
                                                        data-placement="top"
                                                        title="Edit" >
                                                        <i
                                                            class="fa fa-edit"
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
                                                        wire:click="showDeleteModal({{ $media->id }})"
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
                                     {{ $mediaItems->links() }}
                                </div>
                            </div>
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
                                        You are about to delete media
                                        {{$this->mediaId}}. Are you sure about
                                        this?

                                        <footer class="modal-card-foot">
                                            <button
                                                class="button is-danger"
                                                wire:click="delete({{$this->mediaId}})"
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
