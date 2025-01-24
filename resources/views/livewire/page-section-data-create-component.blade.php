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
                                <li class="breadcrumb-item active">Section data</li>
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
                                <h4>Edit section data</h4>
                                <small>Leave blank if no data is needed</small>
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
                                        wire:submit.prevent="create(document.querySelector('#text').value)"
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
                                            <label class="col-sm-4 control-label" >
                                                Image
                                            </label>
                                            @if ($tempImage)
                                                <div class="col-sm-8">
                                                    <a href="{{'/'.$image}}" download><img src="{{'/'.$image}}" alt="{{$name}}" width="100" height="100" /></a>
                                                </div>
                                            @endif

                                            <div class="col-sm-8">
                                                <input
                                                    type="file"
                                                    class="form-control"
                                                    id = "sectionImage"
                                                    wire:change="$emit('handlesectionImageUpload')"
                                                    {{$sectionId?'':'required'}}
                                                />
                                            </div>
                                        </div>
                                        @error('image')
                                            <span
                                                class="error text-danger"
                                                >{{ $message }}</span
                                            >
                                        @enderror

                                        <div class="form-group">
                                            <label class="col-sm-4 control-label" >
                                                Icon
                                            </label>
                                            @if ($tempIcon)
                                                <div class="col-sm-8">
                                                    <a href="{{'/'.$icon}}" download><img src="{{'/'.$icon}}" alt="{{$name}}" width="100" height="100" /></a>
                                                </div>
                                            @endif

                                            <div class="col-sm-8">
                                                <input
                                                    type="file"
                                                    class="form-control"
                                                    id = "sectionIcon"
                                                    wire:change="$emit('handlesectionIconUpload')"
                                                    {{$sectionId?'':'required'}}
                                                />
                                            </div>
                                        </div>
                                        @error('icon')
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
                                            <div class="col-sm-9">
                                                <textarea
                                                    wire:key="editor-{{ now() }}"
                                                    id="text"
                                                    cols="63"
                                                    rows="10"
                                                    placeholder="Enter text."
                                                >
                                                    {!! $text !!}</textarea
                                                >
                                            </div>
                                            @error('text')
                                            <span class="error text-danger">{{
                                                $message
                                            }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label
                                                class="col-sm-2 control-label"
                                                >Link</label
                                            >
                                            <div class="col-sm-10">
                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    placeholder="Enter link"
                                                    wire:model="link"
                                                />
                                            </div>
                                        </div>
                                        @error('link')
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
                                                    {{$this->sectionData? 'Update':'Add'}}
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
        const editor = CKEDITOR.replace('text');
        editor.on('change', function(event){
            // @this.set('text', event.editor.getData());
            document.getElementById('text').value=event.editor.getData();
        });

        document.addEventListener('livewire:load', () => {
            window.livewire.on('handlesectionImageUpload', () => {
                let inputField = document.getElementById('sectionImage')
                try {
                    emitData(inputField,'image');
                } catch (error) {
                    console.error(error);
                }                       
            });

            window.livewire.on('handlesectionIconUpload', () => {
                let inputField = document.getElementById('sectionIcon')
                try {
                    emitData(inputField,'icon');
                } catch (error) {
                    console.error(error);
                }                       
            });
        });

        const getFileNameData = (inputField, file, type) => {
            return {
                file_name: file.name,
                file_extension: file.name.split('.').pop(),
                file_name_without_extension: file.name.split('.').shift(),
                file_size: file.size,
                file_type: type,
            };
        }

        const emitData = (inputField, type) => {
            let file = inputField.files[0];
            let reader = new FileReader();
            reader.onloadend = () => {
                window.livewire.emit('set_file_data', getFileNameData(inputField, file, type));
                window.livewire.emit('file_upload', reader.result)
            }
            reader.readAsDataURL(file);
        }

    </script>
</div>
