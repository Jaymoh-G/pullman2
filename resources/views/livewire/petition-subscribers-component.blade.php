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
                                <li class="breadcrumb-item active">
                                    Petition subscribers
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
                            <div class="card-title pr">
                                <h4>Subscribers</h4>
                            </div>
                            <div class="card-body">
                                @if(Session::has('message'))
                                <div class="alert alert-success" role="alert">
                                    {{Session::get('message')}}
                                </div>
                                @endif
                                <div class="table-responsive">
                                    <table
                                        class="table student-data-table m-t-20"
                                    >
                                        <thead>
                                            <tr>                                                
                                                <th>First name</th>
                                                <th>Last name</th>
                                                <th>Email</th>   
                                                <th>Country</th>                                             
                                                <th>Date</th> 
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($petitionSubscribers as $petitionSubscriber)
                                            <tr>
                                                <td>
                                                    {{$petitionSubscriber->firstName}}
                                                </td>
                                                <td>
                                                    {{$petitionSubscriber->lastName}}
                                                </td>                                                
                                                <td>
                                                    {{$petitionSubscriber->email}}
                                                </td>
                                                <td>
                                                    {{$petitionSubscriber->country}}
                                                </td>
                                                <td>
                                                    {{$petitionSubscriber->created_at}}
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>                                
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                </div>
            </section>
        </div>
    </div>
</div>
