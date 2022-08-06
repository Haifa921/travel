@extends('layouts.app')


@section('content')
    <div class="card card-default">
        <div class="card-header">
            {{ isset($restaurant) ? 'Edit restaurant' : 'Create restaurant' }}
        </div>
        <div class="card-body">
            @include('partials.errors')

            <form
                action="{{ isset($restaurant) ? route('restaurants.update', $restaurant->id) : route('restaurants.store') }}"
                method="POST" enctype='multipart/form-data'>
                @csrf
                @if (isset($restaurant))
                    @method('PUT')
                @endif

                <div class="form-group">
                    <label for="image">{{ trans('blog.Name') }}</label>
                    <input type="text" id="name" class="form-control" name="name"
                        value="{{ isset($restaurant) ? $restaurant->name : '' }}">
                </div>

                <div class="form-group">
                    <label for="country_id">{{ trans('blog.country') }}</label>
                    <select name="country_id" id="country" class="form-control">
                        @foreach ($countries as $country)
                            <option value="{{ $country->id }}"
                                @if (isset($restaurant)) @if ($country->id === $restaurant->country_id)
                        selected @endif
                                @endif
                                >
                                {{ $country->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="stars">{{ trans('blog.country') }}  </th>
            <th>{{ trans('blog.Stars') }} </label>
                    <input type="number" id="stars" class="form-control" name="stars"
                        value="{{ isset($restaurant) ? $restaurant->stars : '' }}">
                </div>
                <div class="form-group">
                    <label for="capacity">{{ trans('blog.capacity') }}</label>
                    <input type="number" id="capacity" class="form-control" name="capacity"
                        value="{{ isset($restaurant) ? $restaurant->capacity : '' }}">
                </div>
                <div class="form-group">
                    <label for="phone">{{ trans('blog.phone') }}</label>
                    <input type="tel" id="phone" class="form-control" name="phone"
                        value="{{ isset($restaurant) ? $restaurant->phone : '' }}">
                </div>

                <div class="form-group">
                    <label for="location">{{ trans('blog.location') }}</label>
                    <textarea name="location" class="form-control" name="location" id="location" cols="5" rows="5">{{ isset($restaurant) ? $restaurant->location : '' }}</textarea>
                </div>
                <div class="form-group">
                    <button class="btn btn-success">
                        {{ isset($restaurant) ? 'Update restaurant' : 'Add restaurant' }}
                    </button>
                </div>
            </form>
        </div>

    </div>
@endsection
