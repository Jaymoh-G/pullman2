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
                                <li class="breadcrumb-item active">What we do</li>
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
                                <h4>Add what we do item</h4>
                            </div>
                        <div class="card-body">
                                @if(Session::has('message'))
                                <div class="alert alert-success" role="alert">
                                    {{Session::get('message')}}
                                </div>
                                @endif
                                <div class="horizontal-form">
                                    <form
                                        class="form-horizontal"
                                        wire:submit.prevent="create(document.querySelector('#description').value)"
                                    >
                                        @csrf
                                        <div class="form-group">
                                            <label
                                                class="col-sm-2 control-label"
                                                >Title</label
                                            >
                                            <div class="col-sm-10">
                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    placeholder="Enter title"
                                                    wire:model="title"
                                                    required
                                                />
                                            </div>
                                        </div>
                                        @error('title')
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

                                           <div class="form-group">
                <label class="col-sm-3 control-label">Meta description </label>
                <small>Max: 158 characters</small>
                <div class="col-sm-9">
                    <textarea
                        wire:model="metaDescription"
                        cols="63"
                        rows="10"
                        placeholder="Enter meta description"
                    ></textarea>
                </div>
                @error('metaDescription')
                <p class="help is-danger">{{ $message }}</p>
                @enderror
            </div>

                                        <div class="form-group">
                                            <label class="col-sm-4 control-label" >
                                                What we do cover image
                                            </label>
                                            @if ($whatWeDoId)
                                                    <a href={{"/".$tempImage}} download><img src={{"/".$tempImage}} alt={{$title}} width="100" height="100" /></a>
                                            @endif

                                            <div class="col-sm-6">
                                                <input
                                                    type="file"
                                                    class="form-control"
                                                    id = "coverImage"
                                                    wire:change="$emit('handlecoverImageUpload')"
                                                    {{$whatWeDoId?'':'required'}}
                                                />
                                            </div>
                                            @error('image')
                                                <span
                                                    class="error text-danger"
                                                    >{{ $message }}</span
                                                >
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label
                                                class="col-sm-2 control-label"
                                                >Equipment Availability</label
                                            >
                                            <div class="col-sm-10">
                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    placeholder="Enter equimentAvailability"
                                                    wire:model="partnerCountries"
                                                    required
                                                />
                                            </div>
                                        </div>
                                        @error('partnerCountries')
                                            <span
                                                class="error text-danger"
                                                >{{ $message }}</span
                                            >
                                        @enderror

                                        <div class="form-group">
                                            <label
                                                class="col-sm-2 control-label"
                                                >Cost Savings</label
                                            >
                                            <div class="col-sm-10">
                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    placeholder="Enter costSavings"
                                                    wire:model="collaborations"
                                                    required
                                                />
                                            </div>
                                        </div>
                                        @error('collaborations')
                                            <span
                                                class="error text-danger"
                                                >{{ $message }}</span
                                            >
                                        @enderror

                                        <div class="form-group">
                                            <label
                                                class="col-sm-2 control-label"
                                                >Customer Satisfaction</label
                                            >
                                            <div class="col-sm-10">
                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    placeholder="Enter customerSatisfaction"
                                                    wire:model="peopleReached"
                                                    required
                                                />
                                            </div>
                                        </div>
                                        @error('peopleReached')
                                            <span
                                                class="error text-danger"
                                                >{{ $message }}</span
                                            >
                                        @enderror

                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <button
                                                    type="submit"
                                                    class="btn btn-default"
                                                >
                                                    {{ $whatWeDoId ? "Update" : "Add" }}
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
            // @this.set('description', event.editor.getData());
            document.getElementById('description').value=event.editor.getData();
        });

        document.addEventListener('livewire:load', () => {
            window.livewire.on('handlecoverImageUpload', () => {
                let inputField = document.getElementById('coverImage')
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
