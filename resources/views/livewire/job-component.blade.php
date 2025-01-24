<div class="content-wrap">
    <div class="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 p-r-0 title-margin-right"></div>
                <!-- /# column -->
                <div class="col-lg-4 p-l-0 title-margin-left">
                    <div class="page-header">
                        <div class="page-title">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="#">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active">Jobs</li>
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
                            <div class="card-title pr">
                                <h4>Jobs</h4>
                                <a
                                    class="create"
                                    href="{{ route('admin.job.create') }}"
                                    ><button class="btn btn-default">
                                        Add Job Post
                                    </button>
                                </a>
                            </div>
                            @if(Session::has('message'))
                            <div class="alert alert-success" role="alert">
                                {{Session::get('message')}}
                            </div>
                            @endif
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table
                                        class="table student-data-table m-t-20"
                                    >
                                        <thead>
                                            <tr>
                                                <th>Title</th>
                                                <th>Description</th>
                                                <th>Date created</th>
                                                <th class="action">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($jobs as $job)
                                            <tr>
                                                <td>{{$job->title}}</td>
                                                <td>{!!$job->description!!}</td>
                                                <td>{{$job->created_at}}</td>
                                                <td>
                                                    <a
                                                        href="{{route('admin.job.edit',['id'=>$job->id])}}"
                                                    >
                                                        <button
                                                            class="
                                                                btn
                                                                btn-success
                                                                btn-sm
                                                                rounded-0
                                                            "
                                                            type="button"
                                                            data-toggle="tooltip"
                                                            data-placement="top"
                                                            title="Edit"
                                                        >
                                                            <i
                                                                class="
                                                                    fa fa-edit
                                                                "
                                                            ></i>
                                                        </button>
                                                    </a>
                                                    <a
                                                        href="{{
                                                            route(
                                                                'admin.job.application'
                                                            )
                                                        }}?id={{$job->id}}"
                                                        class="
                                                            btn
                                                            btn-success
                                                            btn-sm
                                                            rounded-0
                                                        "
                                                        data-toggle="tooltip"
                                                        data-placement="top"
                                                        title="View applications"
                                                    >
                                                        <i
                                                            class="fa fa-list"
                                                        ></i>
                                                    </a>
                                                    <button
                                                        class="
                                                            btn
                                                            btn-danger
                                                            btn-sm
                                                            rounded-0
                                                        "
                                                        type="button"
                                                        data-toggle="tooltip"
                                                        data-placement="top"
                                                        title="Delete"
                                                        wire:click="confirmDelete({{ $job->id }})"
                                                    >
                                                        <i
                                                            class="fa fa-trash"
                                                        ></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                @include('livewire.job.delete')
                            </div>
                            {{$jobs->links()}}
                        </div>
                    </div>
                    <!-- /# column -->
                </div>
            </section>
        </div>
    </div>
</div>
