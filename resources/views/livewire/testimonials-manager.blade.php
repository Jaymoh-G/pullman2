<div class="content-wrap">
    <div class="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4 p-l-0 title-margin-left">
                    <div class="page-header">
                        <div class="page-title">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="#">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active">
                                    Testimonials
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <section id="main-content">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-title pr">
                                <h4>Testimonials</h4>


                                <a class="create" href="{{ route('testimonials.edit') }}">
                                    <button class="btn btn-default">Create</button>
                                </a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table student-data-table m-t-20">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Position</th>
                                                <th>Message</th>
                                                <th>Image</th>
                                                <th class="action">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                              @forelse($testimonials as $review)
                                                <tr>
<td>{{$review->name}}</td><td>{{$review->position}}</td>
<td>{{$review->message}}</td>
                                                    <td>
                                                            <a href="{{ asset($review->image) }}" target="_blank">
                                                                <img src="{{ asset($review->image) }}" alt="{{ $review->name }}" width="50" height="50" />
                                                            </a>

                                                    </td>

                                                    <td>
                                                        <a href="{{ route('testimonials.edit', $review->id) }}" class="btn btn-success btn-sm">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                        <button class="btn btn-danger btn-sm" wire:click="showDeleteModal({{ $review->id }})">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </td>

                                                </tr>
                                                  @empty
              <p>No Testimonial founded</p>
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
                                        <button wire:click="closeModal" class="delete" aria-label="close"></button>
                                    </header>
                                    <section class="modal-card-body">
                                        Are you sure you want to delete: {{$this->getTestimonialName($this->testimonial_id) }}?
                                        <footer class="modal-card-foot">
                                            <button class="button is-danger" wire:click="delete({{ $this->testimonial_id }})">Yes</button>
                                            <button class="button" wire:click="closeModal">Cancel</button>
                                        </footer>
                                    </section>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
