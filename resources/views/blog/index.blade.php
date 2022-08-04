@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-end mb-2">
    <a href="{{route('blog.create')}}" class="btn btn-success ">Add Blog</a>
</div>


<div class="card card-default">
    <div class="card-header">Blog</div>

    <div class="card-body">
        @if ($blog->count()>0)
        <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                <th>Image</th>
                <th>Title</th>
                <th>Category</th>
                <th></th>
                <th></th>
</tr>
            </thead>
            <tbody>
                @foreach ($blog as $blog)
                <tr>
                <td>{{$loop->iteration}}</td>
                    <td>
                        <img src="{{asset('images/' . $blog->media->file_path)}}" width="120px" height="60px"
                            class="img-thumbnail" alt="responsive image">
                    </td>
                    <td>
                        {{ $blog->title }}
                    </td>
                    <td>
                        <a href="{{route('categories.edit', $blog->category->id)}}">
                            {{$blog->category->name}}
                        </a>
                    </td>
                    @if ($blog->trashed())
                    <td>
                        <form action="{{route('restore-blog', $blog->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-info btn-sm">Restore</button>
                        </form>
                    </td>
                    @else
                    <td>
                        <a href="{{route('blog.edit', $blog->id) }}"
                            class="btn btn-info btn-sm">Edit</a>
                    </td>
                    @endif

                    <td>
                        <form action="{{route('blog.destroy', $blog->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">
                                {{$blog->trashed()? 'Delete':'Trash'}}
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <h3 class="text-center">No Blogs Yet</h3>
        @endif


    </div>
</div>
@endsection