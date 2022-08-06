@extends('layouts.app')


@section('content')
    <div class="card card-default">
        <div class="card-header">
            {{ isset($country) ? 'Edit Country' : 'Create Country' }}
        </div>
        <div class="card-body">
            @include('partials.errors')

            <form action="{{ isset($country) ? route('countries.update', $country->id) : route('countries.store') }}"
                method="POST" enctype='multipart/form-data'>
                @csrf
                @if (isset($country))
                    @method('PUT')
                @endif
                <div class="form-group">
                    <label for="image">{{ trans('blog.Name') }}</label>
                    <input type="text" id="name" class="form-control" name="name"
                        value="{{ isset($country) ? $country->name : '' }}">
                </div>
                @if (isset($country->media))
                    <div class=" form-group">
                        <img src="{{ $country->media->file_path }}" alt="" style="width: 100%">
                    </div>
                @endif

                <div class="form-group">
                    <label for="image">{{ trans('blog.Image') }}</label>
                    <input type="file" class="form-control" name="image" id="image">
                </div>
                <div class="form-group">
                    <button class="btn btn-success">
                        {{ isset($country) ? 'Update Country' : 'Add Country' }}
                    </button>
                </div>
            </form>
        </div>

    </div>
@endsection
