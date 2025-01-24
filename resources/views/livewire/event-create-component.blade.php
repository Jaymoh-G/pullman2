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
                                <li class="breadcrumb-item active">Event</li>
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
                                <h4>Create event</h4>
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
                                        wire:submit.prevent="save"
                                    >
                                        <div class="form-group">
                                            <label
                                                class="col-sm-2 control-label"
                                                >Name</label
                                            >
                                            <div class="col-sm-10">
                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    placeholder="Enter event name"
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
                                                >Title</label
                                            >
                                            <div class="col-sm-10">
                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    placeholder="Enter event title"
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
                                                class="col-sm-2 control-label"
                                                >Description</label
                                            >
                                            <div class="col-sm-10">
                                                <textarea
                                                    wire:model="description"
                                                    cols="92"
                                                    rows="10"
                                                    placeholder="Enter event description"
                                                    required
                                                ></textarea>
                                            </div>
                                        </div>
                                        @error('description')
                                            <span
                                                class="error text-danger"
                                                >{{ $message }}</span
                                            >
                                        @enderror

                                        <div class="row">

                                            <label
                                                class="col-sm-1 control-label"
                                                >Location</label
                                            >
                                            <div class="col-sm-4">
                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    placeholder="Enter event location"
                                                    wire:model="location"
                                                    required
                                                />

                                        </div>
                                        @error('location')
                                            <span
                                                class="error text-danger"
                                                >{{ $message }}</span
                                            >
                                        @enderror


                                            <label
                                                class="col-sm-1 control-label"
                                                >Time Zone</label
                                            >
                                            <div class="col-sm-4">
                                                <select name="timeZone" id=""

                                                    wire:model="timeZone"
                                                class="form-control">
                                                <option value="">None</option>
<option value="EAT">EAT</option>
<option value="GMT">GMT</option>
 <option value="CET">CET</option>                                          </select>@error('timeZone')
                                            <span
                                                class="error text-danger"
                                                >{{ $message }}</span
                                            >
                                        @enderror
                                            </div>



</div>
                                        <div class="row">
<label class="col-sm-1 control-label">From</label>

                                            <div class="col-sm-2">

                                                <input
                                                    type="date"
                                                    class="form-control"
                                                    placeholder="Enter start date from"
                                                    wire:model="date_from"
                                                    required
                                                />

                                               @error('date_from')
                                            <span
                                                class="error text-danger"
                                                >{{ $message }}</span
                                            >
                                        @enderror
                                        </div>
                                            <div class="col-sm-2">
                                                <input
                                                    type="time"
                                                    class="form-control"
                                                    placeholder="Enter start time"
                                                    wire:model="time_from"
                                                    required
                                                />

                                        @error('time_from')
                                            <span
                                                class="error text-danger"
                                                >{{ $message }}</span
                                            >
                                        @enderror
                                            </div>



                                            <label  class="col-sm-1 control-label"

                                                >To


                                                </label
                                            >

                                            <div class="col-sm-2">
                                                <input
                                                    type="date"
                                                    class="form-control"
                                                    placeholder="Date to"
                                                    wire:model="date_to"
                                                    required
                                                />
                                                  @error('date_to')
                                            <span
                                                class="error text-danger"
                                                >{{ $message }}</span
                                            >
                                        @enderror
                                            </div>
                                            <div class="col-sm-2">
                                                <input
                                                    type="time"
                                                    class="form-control"
                                                    placeholder="Time to"
                                                    wire:model="time_to"
                                                    required
                                                />
                                                @error('time_to')
                                            <span
                                                class="error text-danger"
                                                >{{ $message }}</span
                                            >
                                        @enderror
                                            </div>


                                        @if(Session::has('error'))
                                            <span
                                                class="error text-danger"
                                                >{{Session::get('error')}}</span
                                            >
                                        @endif


                                            <div class="col-sm-5">
                                                <label
                                               class="col-sm-5 control-label"
                                                >Moderator</label
                                            >
                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    placeholder="Enter moderator"
                                                    wire:model="moderator"
                                                />
                                                @error('moderator')
                                            <span
                                                class="error text-danger"
                                                >{{ $message }}</span
                                            >
                                        @enderror
                                            </div>


                                        <div class="col-sm-5">
                                            <label class="col-sm-5 control-label"

                                                >Registration link</label
                                            >

                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    placeholder="Enter registration link"
                                                    wire:model="registrationLink"
                                                />

                                        </div>
                                         </div>
                                        @error('registrationLink')
                                            <span
                                                class="error text-danger"
                                                >{{ $message }}</span
                                            >
                                        @enderror

                                        <div class="form-group" wire:ignore>
                                            <label
                                                class="col-sm-4 control-label"
                                                >Event image
                                            </label>
                                            @if ($image)
                                                <a href={{"/".$image}} target="_blank"><img src={{"/".$image}} width="100" height="100" /></a>
                                            @endif
                                            <div class="col-sm-8">
                                                <input
                                                    type="file"
                                                    class="form-control"
                                                    id = "eventImage"
                                                    wire:change="$emit('handleeventImageUpload')"
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
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <button
                                                    type="submit"
                                                    class="btn btn-default"
                                                >
                                                    {{$eventId ? 'Update' : 'Create'}}
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
            window.livewire.on('handleeventImageUpload', () => {
                let inputField = document.getElementById('eventImage')
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
