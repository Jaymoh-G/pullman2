<div class="content-wrap">
    <div class="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4 p-l-0 title-margin-left">
                    <div class="page-header">
                        <div class="page-title">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                <li class="breadcrumb-item active">Testimonials</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <section id="main-content">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-title">
                                <h4>Create A Testimonial</h4>
                            </div>
                            <div class="card-body">
                                @if(Session::has('message'))
                                    <div class="alert alert-success" role="alert">
                                        {{Session::get('message')}}
                                    </div>
                                @endif
                                <div class="horizontal-form">
                                    <form class="form-horizontal" wire:submit.prevent="createTestimonial">
                                        @csrf
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Name</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" placeholder="Enter client name" wire:model="name" required />
                                            </div>
                                        </div>
                                        @error('name')
                                            <span class="error text-danger">{{ $message }}</span>
                                        @enderror

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Position</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" placeholder="Enter position" wire:model="position" required />
                                            </div>
                                        </div>
                                        @error('position')
                                            <span class="error text-danger">{{ $message }}</span>
                                        @enderror

                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Message</label>
                                            <div class="col-sm-9">
                                                <textarea class="form-control" rows="10" placeholder="Enter testimonial message" wire:model="message"></textarea>
                                            </div>
                                        </div>
                                        @error('message')
                                            <span class="error text-danger">{{ $message }}</span>
                                        @enderror

                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Image</label>
                                            <div class="col-sm-8">
                                                <input type="file" class="form-control" wire:model="image" />
                                            </div>
                                        </div>
                                        @error('image')
                                            <span class="error text-danger">{{ $message }}</span>
                                        @enderror

                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <button type="submit" class="btn btn-default">
                                                    {{ $testimonial_id ? 'Update' : 'Create' }}
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
    const editor = CKEDITOR.replace('message');
    editor.on('change', function(event) {
        document.querySelector('[wire\\:model="message"]').value = event.editor.getData();
    });
</script>
