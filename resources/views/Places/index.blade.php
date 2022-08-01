@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-end mb-2">
    <a href="{{route('tours.create')}}" class="btn btn-success ">Add Tour</a>
</div>


<div class="card card-default">
    <div class="card-header">Tours</div>

    <div class="card-body">
        @if ($places->count()>0)
        <table class="table">
            <thead>
                <th>Image</th>
                <th>Title</th>
                <th>Category</th>
                <th>Country</th>
                <th></th>
            </thead>
            <tbody>
                @foreach ($places as $place)
                <tr>
                    <td>
                        <img src="images/{{$place->media[0]->file_path}}" width="120px" height="60px"
                            class="img-thumbnail" alt="responsive image">
                    </td>
                    <td>
                        {{ $place->name }}
                    </td>
                    <td>
                        <a href="{{route('places.edit', $place->category->id)}}">
                            {{$place->category->name}}
                        </a>
                    </td>
                    <td>
                       {{ $place->country->name }}
                    </td>
                    @if ($place->trashed())
                    <td>
                        <form action="{{route('restore-tours', $place->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-info btn-sm">Restore</button>
                        </form>
                    </td>
                    @else
                    <td>
                        <a href="{{route('tours.edit', $place->id) }}"
                            class="btn btn-info btn-sm">Edit</a>
                    </td>
                    @endif

                    <td>
                        <form action="{{route('tours.destroy', $place->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">
                                {{$place->trashed()? 'Delete':'Trash'}}
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <h3 class="text-center">No Tours Yet</h3>
        @endif


    </div>
</div>
@endsection