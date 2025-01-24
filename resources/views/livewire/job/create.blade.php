<div class="card-body">
    @if(Session::has('message'))
    <div class="alert alert-success" role="alert">
        {{Session::get('message')}}
    </div>
    @endif
    <div class="horizontal-form">
        <form
            class="form-horizontal"
            wire:submit.prevent="save(document.querySelector('#description').value)"
        >
    <div class="row">
            <div class="col-md-6">
            <div class="form-group">
                <div class="col-sm-10">
                    <input
                        type="text"
                        class="form-control"
                        placeholder="Job Title"
                        wire:model="title"
                    />
                </div>
                @error('title')
                <p class="help is-danger">{{ $message }}</p>
                @enderror
            </div>
            </div>
             <div class="col-md-6">
        <div class="form-group">
            <div class="col-sm-10">
               <input type="text" class="form-control" wire:model="job_type" id="" placeholder="Job Type E.g Fulltime, Internship">
            </div>

            @error('job_type')
            <p class="help is-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
        </div>
            <div class="form-group" >
                <label class="col-sm-4 control-label">Job Description </label>
                <div class="col-sm-11" wire:ignore>
                    <textarea
                    class="form-control"
                        wire:key="editor-{{ now() }}"
                        id="description"
                        cols="20"
                        rows="10"
                        placeholder="Job Description."
                    >
                        {!! $description !!}
                    </textarea>
                </div>
                 @error('description')
                    <p class="help is-danger">{{ $message }}</p>
                    @enderror
            </div>
              <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Job Location</label>
                            <div class="col-sm-10">
                                <input
                                    type="text"
                                    class="form-control"
                                    placeholder="Job Location"
                                    wire:model="location"
                                />
                            </div>
                            @error('location')
                            <p class="help is-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                <div class="col-md-6">
                   <div class="form-group">
                        <label class="col-sm-4 control-label"
                            >Application deadline</label
                        >
                        <div class="col-sm-10">
                            <input
                                type="date"
                                class="form-control"
                                placeholder="Enter deadline"
                                wire:model="deadline"
                                required
                            />
                        </div>
                        @error('deadline')
                        <span class="error text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                 <div class="row">
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-default">
                                {{ $jobId ? "Update" : "Add" }}
                            </button>
                        </div>
                    </div>
                    </div>

                </form>
 </div>
        </div>
</div>

