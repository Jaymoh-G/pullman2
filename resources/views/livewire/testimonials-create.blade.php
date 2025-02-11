<div class="content-wrap">
    <div class="main">
        <div class="container-fluid">
            <div class="row">
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
                            <div class="card-title">
                                <h4>Create Our Work</h4>
                            </div>
                        <div class="card-body">
                                @if(Session::has('message'))
                                <div class="alert alert-success" role="alert">
                                    {{Session::get('message')}}
                                </div>
                                @endif
                                <div class="horizontal-form">
                                    <form
                                        enctype="multipart/form-data"
                                        class="form-horizontal"
                                        wire:submit.prevent="createTestimonial(document.querySelector('#description').value)"
                                    >
                                        @csrf
                                        <div class="form-group">
                                            <label
                                                class="col-sm-2 control-label"
                                                >Name</label
                                            >
                                            <div class="col-sm-10">
                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    placeholder="Enter name"
                                                    wire:model="name"
                                                    required
                                                />
                                            </div>
                                        </div>
                                        @error('name')
                                            <span
                                                class="error text-danger"
                                                >{{ $message }}</span
                                            >
                                        @enderror
                                        <div class="form-group">
                                            <label
                                                class="col-sm-2 control-label"
                                                >Position</label
                                            >
                                            <div class="col-sm-10">
                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    placeholder="Enter position"
                                                    wire:model="position"
                                                    required
                                                />
                                            </div>
                                        </div>
                                        @error('name')
                                            <span
                                                class="error text-danger"
                                                >{{ $message }}</span
                                            >
                                        @enderror
                                        <div class="form-group" wire:ignore>
                                            <label
                                                class="col-sm-3 control-label"
                                                >Description
                                            </label>
                                            <div class="col-sm-10">
                                                <textarea
                                                    wire:key="editor-{{ now() }}"
                                                    id="description"
                                                    cols="92"
                                                    rows="10"
                                                    placeholder="Enter description"
                                                    required
                                                >
                                                {!! $description !!}
                                            </textarea>
                                            </div>
                                        </div>
                                        @error('description')
                                                <span
                                                    class="error text-danger"
                                                    >{{ $message }}</span
                                                >
                                            @enderror

                                     <div class="row">
                                           <div class="form-group col-lg-12">
                                            <label class="col-sm-4 control-label" >
                                                Image
                                            </label>
                                            @if ($testimonialId)
                                                 <div class="col-sm-6">
                                                    <a href={{"/".$testimonialImageTemp}} download>Work image</a>
                                                </div>
                                            @endif

                                            <div class="col-sm-6">
                                                <input
                                                    type="file"
                                                    class="form-control"
                                                    id = "testimonialImageFile"
                                                    wire:change="$emit('handleTestimonialImageFileUpload')"
                                                    {{$testimonialId?'':'required'}}
                                                />
                                            </div>
                                             @error('testimonialImageFile')
                                            <span
                                                class="error text-danger"
                                                >{{ $message }}</span
                                            >
                                        @enderror
                                        </div>
                                     </div>

                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <button
                                                    type="submit"
                                                    class="btn btn-default"
                                                >
                                                    {{ $testimonialId ? "Update Work" : "Add Work" }}
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
    <script src={{ asset('ckeditor/ckeditor.js')}}></script>
    <script>
        const editor = CKEDITOR.replace('description');
        editor.on('change', function(event){
            document.getElementById('description').value=event.editor.getData();
        });
        document.addEventListener('livewire:load', () => {
            window.livewire.on('handleTestimonialImageFileUpload', () => {
                let inputField = document.getElementById('testimonialImageFile')
                try {
                    emitData(inputField);
                } catch (error) {
                    console.error(error);
                }
            });
        });

        const getFileNameData = (inputField, file) => {
            return {
                file_name: file.name,
                file_extension: file.name.split('.').pop(),
                file_name_without_extension: file.name.split('.').shift(),
                file_size: file.size,
            };
        }

        const emitData = (inputField) => {
            let file = inputField.files[0];
            let reader = new FileReader();
            reader.onloadend = () => {
                window.livewire.emit('set_file_data', getFileNameData(inputField, file));
                window.livewire.emit('file_upload', reader.result)
            }
            reader.readAsDataURL(file);
        }

    </script>
</div>
