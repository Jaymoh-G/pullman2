<div class="content-wrap">
    <div class="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 p-r-0 title-margin-right"></div>
                <div class="col-lg-4 p-l-0 title-margin-left">
                    <div class="page-header">
                        <div class="page-title">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="#">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active">Event registrations</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>   
            <section id="main-content">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">                            
                            <div class="card-title pr">
                                <h4>Registrations</h4>
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
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>message</th>
                                                <th>Created</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($registrations as $registration)                
                                            <tr>
                                                <td>{{$registration->name}}</td>
                                                <td>{{$registration->email}}</td>
                                                <td>{{$registration->phone}}</td>
                                                <td>{{$registration->message}}</td>
                                                <td>{{$registration->created_at}}</td>                                                
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>                                                                              
                        </div>
                    </div>
                </div>
            </section>         
        </div>
    </div>
</div>
