@extends('layouts.app')

@section('content')

<div class="card card-default">
    <div class="card-header">{{ trans('blog.Users') }} </div>

    <div class="card-body">
        @if ($users->count()>0)
        <table class="table">
            <thead>
                <th>{{ trans('blog.Image') }} </th>
                <th>{{ trans('blog.Name') }} </th>
                <th>{{ trans('blog.Email') }} </th>
                <th></th>
                <th></th>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>
                        <img width="40px" height="40px" src="https://ui-avatars.com/api/?name={{$user->fname}}" alt="">
                    </td>
                    <td>
                        {{ $user->fname }} {{ $user->lname }}
                    </td>
                    <td>
                        {{ $user->email }}
                    </td>

                    <td>
                        <form action="{{route('users.make-admin', $user->id)}}" method="POST">
                            @csrf
                            <button type="submit" class=" btn btn-success btn-sm">{{ trans('blog.Make_Admin') }} </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <h3 class="text-center">No Users Yet</h3>
        @endif


    </div>
</div>
@endsection