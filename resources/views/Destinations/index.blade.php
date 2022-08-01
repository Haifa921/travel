@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-end mb-2">
    <a href="{{route('destinations.create')}}" class="btn btn-success ">{{trans('blog.Add_Destination')}}</a>
</div>


<div class="card card-default">
    <div class="card-header">{{trans('blog.Destinations')}}</div>

    <div class="card-body">
        @if ($destinations->count()>0)
        <table class="table">
            <thead>
                <th>{{trans('blog.Image')}}</th>
                <th>{{trans('blog.Title')}}</th>
                <th>{{trans('blog.Category')}}</th>
                <th>{{trans('blog.Pricing')}}</th>
                <th></th>
            </thead>
            <tbody>
                @foreach ($destinations as $destinations)
                <tr>
                    <td>
                        <img src="{{asset('/storage/' . $destinations->image)}}" width="120px" height="60px"
                            class="img-thumbnail" alt="responsive image">
                    </td>
                    <td>
                        {{ $destinations->title }}
                    </td>
                    <td>
                        <a href="{{route('categories.edit', $destinations->category->id)}}">
                            {{$destinations->category->name}}
                        </a>
                    </td>
                    @if ($destinations->trashed())
                    <td>
                        <form action="{{route('restore-destinations', $destinations->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-info btn-sm">Restore</button>
                        </form>
                    </td>
                    @else
                    <td>
                        <a href="{{route('destinations.edit', $destinations->id) }}"
                            class="btn btn-info btn-sm">Edit</a>
                    </td>
                    @endif

                    <td>
                        <form action="{{route('destinations.destroy', $destinations->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">
                                {{$destinations->trashed()? 'Delete':'Trash'}}
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <h3 class="text-center">{{trans('blog.No_Destinations_Yet')}}</h3>
        @endif


    </div>
</div>
@endsection