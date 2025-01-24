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
                                <li class="breadcrumb-item active">Company team</li>
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
                                <h4>Create team member</h4>
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
                                        wire:submit.prevent="createTeam(document.querySelector('#bio').value, document.getElementById('directorChecked').value)"
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
                                                    placeholder="Enter member name"
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
                                                >Email</label
                                            >
                                            <div class="col-sm-10">
                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    placeholder="Enter member email"
                                                    wire:model="email"
                                                />
                                            </div>
                                        </div>
                                        @error('email')
                                            <span
                                                class="error text-danger"
                                                >{{ $message }}</span
                                            >
                                        @enderror
                                        
                                        <div class="form-group" wire:ignore>
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <span class="control-label">Position:</span>
                                                </div>
                                                <div class="col-md-2">
                                                    <input type="radio" id="directorChecked" class="control-label"> Director                                                    
                                                </div>
                                                <div class="col-md-2">
                                                    <input type="radio" id="otherChecked" class="control-label" checked> Other position
                                                    </div>    

                                            </div>
                                           
                                            <div class="col-sm-10" id="positionDiv">
                                                <input
                                                    type="text"
                                                    id="position"
                                                    class="form-control"
                                                    placeholder="Enter member position"
                                                    wire:model="position"
                                                />
                                            </div>
                                        </div>
                                        @error('position')
                                            <span
                                                class="error text-danger"
                                                >{{ $message }}</span
                                            >
                                        @enderror

                                        <div class="form-group" wire:ignore>
                                            <label
                                                class="col-sm-3 control-label"
                                                >Bio
                                            </label>
                                            <div class="col-sm-9">
                                                <textarea
                                                    wire:key="editor-{{ now() }}"
                                                    id="bio"
                                                    cols="63"
                                                    rows="10"
                                                    placeholder="Enter bio info."
                                                >
                                                    {!! $bio !!}</textarea
                                                >
                                            </div>
                                        </div>
                                        @error('bio')
                                            <span
                                                class="error text-danger"
                                                >{{ $message }}</span
                                            >
                                        @enderror

                                        <div class="form-group">
                                            <label class="col-sm-4 control-label" >
                                                Image
                                            </label>
                                            @if ($teamId)
                                                <div class="col-sm-8">
                                                    <a href={{"/".$tempImage}} download><img src={{"/".$tempImage}} alt={{$name}} width="100" height="100" /></a>
                                                </div>
                                            @endif

                                            <div class="col-sm-8">
                                                <input
                                                    type="file"
                                                    class="form-control"
                                                    id = "teamImage"
                                                    wire:change="$emit('teamImageUpload')"
                                                    {{$teamId?'':'required'}}
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
                                            <label
                                                class="col-sm-2 control-label"
                                                >Facebook</label
                                            >
                                            <div class="col-sm-10">
                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    placeholder="Facebook link"
                                                    wire:model="facebook"

                                                />
                                            </div>
                                        </div>
                                        @error('facebook')
                                            <span
                                                class="error text-danger"
                                                >{{ $message }}</span
                                            >
                                        @enderror

                                        <div class="form-group">
                                            <label
                                                class="col-sm-2 control-label"
                                                >LinkedIn</label
                                            >
                                            <div class="col-sm-10">
                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    placeholder="LinkedIn link"
                                                    wire:model="linkedIn"

                                                />
                                            </div>
                                        </div>
                                        @error('linkedIn')
                                            <span
                                                class="error text-danger"
                                                >{{ $message }}</span
                                            >
                                        @enderror

                                        <div class="form-group">
                                            <label
                                                class="col-sm-2 control-label"
                                                >Twitter</label
                                            >
                                            <div class="col-sm-10">
                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    placeholder="Enter twitter link"
                                                    wire:model="twitter"

                                                />
                                            </div>
                                        </div>
                                        @error('twitter')
                                            <span
                                                class="error text-danger"
                                                >{{ $message }}</span
                                            >
                                        @enderror

                                        <div class="form-group">
                                            <label
                                                class="col-sm-2 control-label"
                                                >Instagram</label
                                            >
                                            <div class="col-sm-10">
                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    placeholder="Enter instagram link"
                                                    wire:model="instagram"

                                                />
                                            </div>
                                        </div>
                                        @error('instagram')
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
                                                {{$teamId?'Update':'Create'}}
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
        const editor = CKEDITOR.replace('bio');
        editor.on('change', function(event){
            // @this.set('bio', event.editor.getData());
            document.getElementById('bio').value=event.editor.getData();
        })
    </script>
    <script src="{{ asset('assets/js/lib/jquery.min.js') }}"></script>
    <script>
        $(document).ready(function() {            
            $('#positionDiv').show();
            $('#otherChecked').click(function() {
                $('#otherChecked').attr('checked');
                $('#directorChecked').removeAttr('checked');
                $('#positionDiv').show();
                $('#position').val('');
            });

            $('#directorChecked').click(function() {
                $('#positionDiv').hide();
                $('#directorChecked').attr('checked');
                $('#otherChecked').removeAttr('checked');
                $('#directorChecked').val('director');
            });            
        });

        document.addEventListener('livewire:load', () => {
            window.livewire.on('teamImageUpload', () => {
                let inputField = document.getElementById('teamImage')
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
