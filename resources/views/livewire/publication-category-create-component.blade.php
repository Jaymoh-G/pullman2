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
                                <li class="breadcrumb-item active">Categories</li>
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
                                <h4>Create category</h4>
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
                                        wire:submit.prevent="createCategory"
                                    >
                                        @csrf
                                        
                                        <div class="form-group">
                                            <label
                                                class="col-sm-2 control-label"
                                                >Category</label
                                            >
                                            <div class="col-sm-10">
                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    placeholder="Enter Category"
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
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <button
                                                    type="submit"
                                                    class="btn btn-default"
                                                >
                                                    @if($categoryId)
                                                        Update
                                                    @else
                                                        Create
                                                    @endif
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
