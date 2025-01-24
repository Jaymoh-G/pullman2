<div class="card-title pr">
    <h4>Latest</h4>
    <div class="action">
        <a
            href="{{ route('admin.blog.categories.list') }}"
            class="btn btn-primary btn-sm"
        >
            Categories
        </a>
        <a
            href="{{ route('admin.blog.tags.list') }}"
            class="btn btn-secondary btn-sm"
        >
            Tags
        </a>
        <a
            href="{{ route('admin.blogs.create') }}"
            class="btn btn-default btn-sm"
        >
            Add Post
        </a>
    </div>
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
                    <th>Title</th>
                    <th>Category</th>
                    <th>Tags</th>
                    <th>Author</th>
                    <th>Date created</th>
                    <th class="action">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($blogs as $blog)
                <tr>
                    <td>{{$blog->title}}</td>
                    <td>{{isset($blog->category_id)?$this->getCategoryName($blog->category_id):'blog' }}</td>
                    <td>
                        @if($blog->tags)
                        {{implode(", ",unserialize($blog->tags));}}
                        @endif
                    </td>
                    <td>{{$blog->author}}</td>
                    <td>{{$blog->created_at}}</td>
                    <td>
                        <a
                            href="/admin/latest/create?id={{$blog->id}}"
                            class="btn btn-success btn-sm rounded-0"
                            data-toggle="tooltip"
                            data-placement="top"
                            title="Edit"
                        >
                            <i class="fa fa-edit"></i>
                        </a>
                        <a
                            href="/admin/latest/comments?id={{$blog->id}}"
                            class="btn btn-success btn-sm rounded-0"
                            data-toggle="tooltip"
                            data-placement="top"
                            title="View comments"
                        >
                            <i class="fa fa-comment"></i>
                        </a>
                        <a
                            href="{{route('frontend.blog.details',['category'=>isset($blog->category_id)?$this->getCategoryName($blog->category_id):'blog','slug'=>$blog->slug])}}"
                            target="_blank"
                            class="btn btn-success btn-sm rounded-0"
                            data-toggle="tooltip"
                            data-placement="top"
                            title="View page"
                        >
                            <i class="fa fa-eye"></i>
                        </a>
                        <button
                            class="btn btn-danger btn-sm rounded-0"
                            type="button"
                            data-toggle="tooltip"
                            data-placement="top"
                            title="Delete"
                            wire:click="confirmDelete({{ $blog->id }})"
                        >
                            <i class="fa fa-trash"></i>
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div>
            <p>{{$blogs->links()}}</p>
        </div>
    </div>
</div>
