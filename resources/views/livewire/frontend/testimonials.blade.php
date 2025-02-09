


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
                                <li class="breadcrumb-item active">Testimonials</li>
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
                                <h4>Team</h4>

                                                    <a class="create"
                                                        href="{{
                                                            route('admin.team.create')
                                                        }}"
                                                        ><button
                                                            class="
                                                                btn btn-default
                                                            "
                                                        >
                                                            Create
                                                        </button>
                                                    </a>

                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table student-data-table m-t-20">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Position</th>
                                                <th>Image</th>
                                               <th class="action">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($testimonials as $testimonial)
                                            <tr>
                                                <td>{{$testimonial->name}}</td>
                                                <td>{{$testimonial->position}}</td>
                                                <td>
                                                    <a href="{{'/'.$testimonial->image}}" target="_blank"><img src="{{'/'.$testimonial->image}}" alt={{$testimonial->name}} width="50" height="50" /></a>
                                                </td>
                                                <td>
                                                    <a
                                                        href={{'/admin/team/create?id='.$testimonial->id}}
                                                        class="btn btn-success btn-sm rounded-0"
                                                        data-toggle="tooltip"
                                                        data-placement="top"
                                                        title="Edit"
                                                    >
                                                        <i class="fa fa-edit"></i>
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
                                                        wire:click="showDeleteModal({{ $testimonial->id }})"
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
                                <p>{{$testimonial->links()}}</p>
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
                                        You are about to delete user: {{$this->getTestimonialName($this->testimonialId)}}. Are you sure about this?

                                        <footer class="modal-card-foot">
                                            <button class="button is-danger" wire:click="delete({{$this->testimonialId}})">
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
