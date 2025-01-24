<div class="card-title pr">
    <h4>Job Applications for {{$job->title}}</h4>
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
                    <th>Email</th>
                    <th>Telephone</th>
                    <th>Education level</th>
                    <th>Professional info</th>
                    <th>Cover letter</th>
                    <th>CV</th>
                    <th>Other Documents</th>
                    <th>Date of Application</th>
                </tr>
            </thead>
            <tbody>
                @foreach($applications as $application)
                <tr>
                    <td>{{$application->name}}</td>
                    <td>{{$application->email}}</td>
                    <td>{{$application->telephone}}</td>
                    <td>{{$application->education_qualification}}</td>
                    <td>{{$application->professional_information}}</td>
                    <td>
                        <a
                            href="{{'/'.$application->cover_letter_path}}"
                            target="_blank"
                            ><i class="fa fa-download" aria-hidden="true"></i
                        ></a>
                    </td>
                    <td>
                        <a href="{{'/'.$application->cv_path}}" target="_blank"
                            ><i class="fa fa-download" aria-hidden="true"></i
                        ></a>
                    </td>
                    <td>
                        @if ($application->other_doc_path)
                        @foreach(unserialize($application->other_doc_path) as
                        $document)
                        <a href="{{ '/'.$document }}" target="_blank"
                            ><i class="fa fa-download" aria-hidden="true"></i
                        ></a>
                        @endforeach @endif
                    </td>
                    <td>{{$application->updated_at}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
