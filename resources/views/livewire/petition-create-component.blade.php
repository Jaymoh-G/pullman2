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
                                <li class="breadcrumb-item active">
                                    Petitions
                                </li>
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
                                <h4>Create petition</h4>
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
                                                    placeholder="Enter Title"
                                                    wire:model="title"
                                                    required
                                                />
                                            </div>
                                            @error('title')
                                            <span class="error text-danger">{{
                                                $message
                                            }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label
                                                class="col-sm-3 control-label"
                                                >Description
                                            </label>
                                            <div class="col-sm-9">
                                                <textarea
                                                    wire:model="description"
                                                    cols="92"
                                                    rows="10"
                                                    placeholder="Enter description"
                                                ></textarea>
                                            </div>
                                            @error('description')
                                            <span class="error text-danger">{{
                                                $message
                                            }}</span>
                                            @enderror
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-lg-6">
                                                <label
                                                    class="
                                                        col-sm-6
                                                        control-label
                                                    "
                                                    >Petition Blog Link</label
                                                >
                                                <div class="col-sm-6">
                                                    <input
                                                        type="text"
                                                        class="form-control"
                                                        placeholder="Enter Url"
                                                        wire:model="url"
                                                        required
                                                    />
                                                </div>
 @error('url')
                                            <span class="error text-danger">{{
                                                $message
                                            }}</span>
                                            @enderror

                                            </div>
                                            <div class="form-group col-lg-6">
                                                <label
                                                    class="
                                                        col-sm-6
                                                        control-label
                                                    "
                                                    >Display Status</label
                                                >
                                                <div class="col-sm-6">
                                                    <!-- select option -->
                                                    <select
                                                        class="form-control"
                                                        wire:model="display"
                                                        required
                                                    >
                                                        <option value="1"> On</option>
                                                        <option value="0">Off</option>
                                                    </select>


                                                </div>
                                                @error('display')
                                                <span
                                                    class="error text-danger"
                                                    >{{ $display }}</span
                                                >
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div
                                                class="
                                                    col-sm-offset-2 col-sm-10
                                                "
                                            >
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
