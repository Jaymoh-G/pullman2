<div>
    <div class="card-title pr">
        <h4>Events</h4>

        <a class="create" href="{{ route('admin.event.create') }}"
            ><button class="btn btn-default">Create</button>
        </a>
    </div>
    @if(Session::has('message'))
    <div class="alert alert-success" role="alert">
        {{Session::get('message')}}
    </div>
    @endif
    <div class="card-body">
        <div class="table-responsive">
            <table class="table student-data-table m-t-20">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Title</th>
                        <th>From</th>
                        <th>To</th>
                        <th>Time Zone</th>
                        <th>Moderator</th>
                        <th>Registration Link</th>
                        <th>Image</th>
                        <th class="create">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($events as $event)
                    <tr>
                        <td>{{$event->name}}</td>
                        <td>{{$event->title}}</td>
                        <td>
                            {{$event->date_from->toDateString().' '.$event->time_from}}
                        </td>
                        <td>
                            {{$event->date_to->toDateString().' '.$event->time_to}}
                        </td>
                        <td>{{$event->timeZone}}</td>
                        <td>{{$event->moderator}}</td>
                        <td>
                            {{$event->registrationLink}}
                        </td>
                        <td>
                            <a href="{{'/'.$event->image}}" target="_blank"
                                ><img
                                    src="{{'/'.$event->image}}"
                                    alt="{{$event->name}}"
                                    width="50"
                                    height="50"
                            /></a>
                        </td>
                        <td>
                            <a
                                href="/admin/event/create?id={{$event->id}}"
                                class="btn btn-success btn-sm rounded-0"
                                data-toggle="tooltip"
                                data-placement="top"
                                title="Edit"
                            >
                                <i class="fa fa-edit"></i>
                            </a>
                            <a
                                href="{{route('admin.event.registration',['id'=>$event->id])}}"
                                class="btn btn-success btn-sm rounded-0"
                                data-toggle="tooltip"
                                data-placement="top"
                                title="Registrations"
                            >
                                <i class="fa fa-registered"></i>
                            </a>
                            <button
                                class="btn btn-danger btn-sm rounded-0"
                                type="button"
                                data-toggle="tooltip"
                                data-placement="top"
                                title="Delete"
                                wire:click="confirmDelete({{ $event->id }})"
                            >
                                <i class="fa fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{$events->links()}}
    </div>
</div>
