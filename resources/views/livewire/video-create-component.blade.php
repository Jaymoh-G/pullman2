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
                                <li class="breadcrumb-item active">Video</li>
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
                                <h4>Create video</h4>
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
                                        <div class="form-group" wire:ignore>
                                            <label class="col-sm-4 control-label" >
                                                Video link
                                            </label>
                                            <div class="col-sm-8">
                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    placeholder="Enter video link"
                                                    wire:model="video_link"
                                                />
                                            </div>
                                        </div>  
                                        
                                        @error('video_link')
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
</div>