@extends('layouts.app')

@section('content')

    <div class="d-flex justify-content-end mb-2">
        <a href="{{ route('tours.create') }}" class="btn btn-success ">Add Tour</a>
    </div>
    <div class="card card-default">
        <div class="card-header">Tours</div>

        <div class="card-body">
            @if ($destinations->count() > 0)
                <table class="table">
                    <thead>
                        <th>{{ trans('blog.Image') }}</th>
                        <th>{{ trans('blog.Title') }}</th>
                        <th>{{ trans('blog.Category') }}</th>
                        <th>{{ trans('blog.Pricing') }}</th>
                        <th></th>
                    </thead>
                    <tbody>
                        @foreach ($destinations as $destination)
                            <tr>
                                <td>
                                    <img src="images/{{ $destination->touristPlace->media[0]->file_path }}" width="120px"
                                        height="60px" class="img-thumbnail" alt="responsive image">
                                </td>
                                <td>
                                    {{ $destination->name_with_place }}
                                </td>
                                <td>
                                    <a href="{{ route('categories.edit', $destination->touristPlace->category->id) }}">
                                        {{ $destination->touristPlace->category->name }}
                                    </a>
                                </td>
                                <td>
                                    SYP {{ $destination->price }}
                                </td>
                                @if ($destination->trashed())
                                    <td>
                                        <form action="{{ route('restore-tours', $destination->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-info btn-sm">Restore</button>
                                        </form>
                                    </td>
                                @else
                                    <td>
                                        <a href="{{ route('tours.edit', $destination->id) }}"
                                            class="btn btn-info btn-sm">Edit</a>
                                    </td>
                                @endif

                                <td>
                                    <form action="{{ route('tours.destroy', $destination->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            {{ $destination->trashed() ? 'Delete' : 'Trash' }}
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <h3 class="text-center">{{ trans('blog.No_Destinations_Yet') }}</h3>
            @endif


        </div>
    </div>
@endsection
