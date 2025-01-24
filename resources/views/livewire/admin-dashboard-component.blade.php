<div class="content-wrap">
    <div class="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 p-r-0 title-margin-right">
                    <div class="page-header">
                        <div class="page-title">
                            <h1>Hello, <span>Welcome Here</span></h1>
                        </div>
                    </div>
                </div>
                <!-- /# column -->
                <div class="col-lg-4 p-l-0 title-margin-left">
                    <div class="page-header">
                        <div class="page-title">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('admin.dashboard') }}"
                                        >Dashboard</a
                                    >
                                </li>
                                <li class="breadcrumb-item active">Home</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- /# column -->
            </div>
            <!-- /# row -->
            <section id="main-content">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="stat-widget-one">
                                <div class="stat-icon dib">
                                    <i
                                        class="
                                            ti-book
                                            color-success
                                            border-success
                                        "
                                    ></i>
                                </div>
                                <div class="stat-content dib">
                                    <div class="stat-text">Our Work</div>
                                    <div class="stat-digit">
                                        {{ $publicationCount }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="stat-widget-one">
                                <div class="stat-icon dib">
                                    <i
                                        class="
                                            ti-link
                                            color-primary
                                            border-primary
                                        "
                                    ></i>
                                </div>
                                <div class="stat-content dib">
                                    <div class="stat-text">Water and sewer works</div>
                                    <div class="stat-digit">
                                        {{ $inNewsCount }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="card">
                            <div class="stat-widget-one">
                                <div class="stat-icon dib">
                                    <i
                                        class="
                                            ti-user
                                            color-danger
                                            border-danger
                                        "
                                    ></i>
                                </div>
                                <div class="stat-content dib">
                                    <div class="stat-text">Excavation and Demolition</div>
                                    <div class="stat-digit">
                                        {{ $blogCategoryCount }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="stat-widget-one">
                                <div class="stat-icon dib">
                                    <i
                                        class="
                                            ti-layout-grid2
                                            color-pink
                                            border-pink
                                        "
                                    ></i>
                                </div>
                                <div class="stat-content dib">
                                    <div class="stat-text">Equipment $ Machine</div>
                                    <div class="stat-digit">
                                        {{ $equipCount }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row hidden">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-title">
                                <h4>Petitions</h4>
                            </div>
                            <div class="card-body">
                                <div class="ct-bar-chart m-t-30"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- /# column -->
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-title pr">
                                <h4>Dashboard Users</h4>
                            </div>

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table
                                        class="table student-data-table m-t-20"
                                    >
                                        <thead>
                                            <tr>
                                                <th>User Name</th>
                                                <th>email</th>
                                                <th>Role</th>
                                                <th>Created at</th>
                                            </tr>
                                        </thead>
                                        @foreach ($users as $user)
                                        <tbody>
                                            <tr>
                                                <td>{{$user->name}}</td>
                                                <td>{{$user->email}}</td>
                                                <td>{{$user->utype}}</td>
                                                <!-- human readable created_at -->
                                                <td>
                                                    {{$user->created_at->format('d-m-Y')}}
                                                </td>
                                            </tr>
                                        </tbody>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                        <p>{{$users->links()}}</p>
                    </div>
                    <!-- /# column -->
                </div>
            </section>
        </div>
    </div>
</div>
