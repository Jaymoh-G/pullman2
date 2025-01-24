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
                            <div class="card-title">
                                <h4>Create media</h4>
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
                                        wire:submit.prevent="createMedia"
                                    >
                                        @csrf
                                        <div class="form-group">
                                            <label
                                                class="col-sm-2 control-label"
                                                >Category</label
                                            >
                                            <div class="col-sm-10">
                                                <select wire:model="category" class="form-control" id="category" required>
                                                    <option value="" selected>Choose category</option>
                                                    <option value="podcast">Podcast</option>
                                                </select>
                                            </div>
                                        </div>
                                        @error('category')
                                                <span
                                                    class="error text-danger"
                                                    >{{ $message }}</span
                                                >
                                            @enderror
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
                                        <div class="form-group">
                                            <label
                                                class="col-sm-3 control-label"
                                                >Description
                                            </label>
                                            <div class="col-sm-9">
                                                <textarea
                                                    wire:model="description"
                                                    id="body"
                                                    cols="92"
                                                    rows="10"
                                                    placeholder="Enter description"
                                                ></textarea>
                                            </div>
                                        </div>
                                        @error('description')
                                                <span
                                                    class="error text-danger"
                                                    >{{ $message }}</span
                                                >
                                            @enderror

                                        <div class="form-group">
                                            <label class="col-sm-4 control-label" >
                                                File upload
                                            </label>
                                            @if ($mediaId)
                                                @if($category == 'image')
                                                    <div class="col-sm-8">
                                                        <a href={{"/".$file_path}} download><img src={{"/".$file_path}} alt={{$title}} width="100" height="100" /></a>
                                                    </div>
                                                @else
                                                    <div class="col-sm-8">
                                                        <a href={{"/".$file_path}} download>Current: {{$title}}</a>
                                                    </div>
                                                @endif
                                            @endif

                                            <div class="col-sm-8">
                                                <input
                                                    type="file"
                                                    class="form-control"
                                                    id = "mediaFile"
                                                    wire:change="$emit('handlemediaFileUpload')"
                                                    {{$mediaId?'':'required'}}
                                                />
                                            </div>
                                        </div>
                                        @error('file_path')
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
                                                    Create
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
    <script>
        document.addEventListener('livewire:load', () => {
            window.livewire.on('handlemediaFileUpload', () => {
                let inputField = document.getElementById('mediaFile')
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
