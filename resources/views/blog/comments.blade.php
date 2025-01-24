<div class="card-title pr">
    <h4>Comments for {{$blog->title}}</h4>
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
                    <th>Comment</th>
                    <th>Approved by</th>
                    <th>Created</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($blogComments as $comment)                
                <tr>
                    <td>{{$comment->user_name}}</td>
                    <td>{{$comment->email}}</td>
                    <td>{{$comment->comment}}</td>
                    <td>{{$comment->approved_by}}</td>
                    <td>{{$comment->created_at}}</td>
                    <td>
                       @if ($comment->approved)
                            <button
                                class="btn btn-success btn-sm rounded-0"
                                type="button"
                                data-toggle="tooltip"
                                data-placement="top"
                                title="Disapprove"
                                wire:click = "disapprove({{$comment->id}})"
                            >
                                <i class="fa fa-thumbs-down"></i>
                            </button>
                       @else
                            <button
                                class="btn btn-success btn-sm rounded-0"
                                type="button"
                                data-toggle="tooltip"
                                data-placement="top"
                                title="Approve"
                                wire:click = "approve({{$comment->id}})"
                            >
                                <i class="fa fa-thumbs-up"></i>
                            </button>
                       @endif                       
                       
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
                            wire:click = "showDeleteModal({{$comment->id}})"
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
</div>