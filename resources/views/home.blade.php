@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="card-body">
                            @if ($reservations->count() > 0)
                                <table class="table">
                                    <thead>
                                        <th>{{ trans('blog.Name') }} </th>
                                        <th>{{ trans('blog.customer') }} </th>
                                        <th>{{ trans('blog.seats') }} </th>
                                        <th>{{ trans('blog.price/seat') }} </th>
                                        <th></th>
                                    </thead>

                                    <tbody>
                                        @foreach ($reservations as $r)
                                            <tr>
                                                <td>
                                                    {{ $r->tour->name_with_place }}
                                                </td>
                                                <td>
                                                    {{ $r->user->fname }} {{ $r->user->lname }}
                                                <td>
                                                <td>
                                                    {{ $r->seats_number }}
                                                <td>
                                                <td>
                                                    {{ $r->price_per_seat }}
                                                <td>
                                                    {{$r->status}}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog"
                                    aria-labelledby="deleteModalLabel">
                                    <div class="modal-dialog">
                                        <form action="" method="POST" id="deleteTagForm">
                                            @csrf

                                            @method('DELETE')
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="deleteModalLabel">Delete Tag</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p class="text-center text-bold">
                                                        Are you sure you want to delete this Tag?
                                                    </p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">No, go back</button>
                                                    <button type="submit" class="btn btn-danger">Yes,Delete</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            @else
                                <h3 class="text-center">No reservations Yet</h3>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
