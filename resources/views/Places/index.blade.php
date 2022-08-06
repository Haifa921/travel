@extends('layouts.app')

@section('content')

    <div class="d-flex justify-content-end mb-2">
        <a href="{{ route('places.create') }}" class="btn btn-success ">{{ trans('blog.Add_Place') }} </a>
    </div>


    <div class="card card-default">
        <div class="card-header">{{ trans('blog.Places') }}</div>

        <div class="card-body">
            @if ($places->count() > 0)
                <table class="table">
                    <thead>
                        <th>{{ trans('blog.Image') }}</th>
                        <th>{{ trans('blog.Title') }}</th>
                        <th>{{ trans('blog.Category') }}</th>
                        <th>{{ trans('blog.Country') }}</th>
                        <th></th>
                    </thead>
                    <tbody>
                        @foreach ($places as $place)
                            <tr>
                                <td>
                                    <img src="{{ $place->media[0]->file_path }}" width="120px" height="60px"
                                        class="img-thumbnail" alt="responsive image">
                                </td>
                                <td>
                                    {{ $place->name }}
                                </td>
                                <td>
                                    <a href="{{ route('places.edit', $place->category->id) }}">
                                        {{ $place->category->name }}
                                    </a>
                                </td>
                                <td>
                                    {{ $place->country->name }}
                                </td>
                                @if ($place->trashed())
                                    <td>
                                        <form action="{{ route('restore-places', $place->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-info btn-sm">Restore</button>
                                        </form>
                                    </td>
                                @else
                                    <td>
                                        <a href="{{ route('places.edit', $place->id) }}"
                                            class="btn btn-info btn-sm">{{ trans('blog.Edit') }}</a>
                                    </td>
                                @endif

                                <td>
                                    <form action="{{ route('places.destroy', $place->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            {{ $place->trashed() ? 'Delete' : 'Trash' }}
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <h3 class="text-center">No Places Yet</h3>
            @endif


        </div>
    </div>
@endsection
