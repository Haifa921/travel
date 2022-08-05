@extends('layouts.app')

@section('content')
    <div class="card card-default">
        <div class="card-header">
            {{ isset($destination) ? 'Edit Tour' : 'Create Tour' }}
        </div>

        <div class="card-body">
            @include('partials.errors')
            <form action="{{ isset($destination) ? route('tours.update', $destination->id) : route('tours.store') }}"
                method="POST" enctype="multipart/form-data">
                @csrf

                @if (isset($destination))
                    @method('PUT')

                @endif
                <div class="form-group">
                    <label for="tourist_place_id">{{ trans('blog.tourist_place') }}</label>
                    <select name="tourist_place_id" id="category" class="form-control">
                        @foreach ($touristPlace as $place)
                            <option value="{{ $place->id }}"
                                @if (isset($destination)) @if ($place->id === $destination->category_id)
                        selected @endif
                                @endif
                                >
                                {{ $place->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="price">{{ trans('blog.price') }}</label>
                    <input type="number" name="price" class="form-control" name="price" id="price"
                        value="{{ isset($destination) ? $destination->price : '' }}" />
                </div>
                <div class="form-group">
                    <label for="name">{{ trans('blog.name') }}</label>
                    <input type="text" class="form-control" name="name" id="name"
                        value="{{ isset($destination) ? $destination->name : '' }}">
                </div>

                <div class="form-group">
                    <label for="Description">{{ trans('blog.Description') }}</label>
                    <textarea name="description" class="form-control" name="description" id="description" cols="5" rows="5">{{ isset($destination) ? $destination->description : '' }}</textarea>
                </div>
                <div class="form-group">
                    <label for="schedule">{{ trans('blog.schedule') }}</label>
                    <textarea name="schedule" class="form-control" name="schedule" id="schedule" cols="5" rows="5">{{ isset($destination) ? $destination->schedule : '' }}</textarea>
                </div>

                <div class="form-group">
                    <label for="seats">{{ trans('blog.seats') }}</label>
                    <input type="number" name="seats" class="form-control" name="seats" id="seats"
                        value="{{ isset($destination) ? $destination->seats : '' }}" />
                </div>

                {{-- <div class="form-group">
                    <label for="content">{{ trans('blog.Content') }}</label>
                    <input id="content" type="hidden" name="content"
                        value="{{ isset($destination) ? $destination->content : '' }}">
                    <trix-editor input="content"></trix-editor>
                </div> --}}

                <div class="form-group">
                    <label for="takeoff_date">{{ trans('blog.takeoff_date') }} </label>
                    <input type="text" class="form-control" name="takeoff_date" id="takeoff_date"
                        value="{{ isset($destination) ? $destination->takeoff_date : '' }}"">
                </div>
                <div class="form-group">
                    <label for="published_at">{{ trans('blog.Published_At') }} </label>
                    <input type="text" class="form-control" name="published_at" id="published_at"
                        value="{{ isset($destination) ? $destination->published_at : '' }}"">
                </div>
                <div class="form-group">
                    <label for="duration">{{ trans('blog.duration') }} in days</label>
                    <input type="number" name="duration" class="form-control" name="duration" id="duration"
                        value="{{ isset($destination) ? $destination->duration : '' }}" />
                </div>

                @if ($tags->count() > 0)
                    <div class="form-group">
                        <label for="tags">{{ trans('blog.Tags') }}</label>

                        <select name="tags" id="tags" class="form-control tags-selector" multiple>
                            @foreach ($tags as $tag)
                                <option value="{{ $tag->id }}"
                                    @if (isset($destination)) @if ($destination->hasTag($tag->id))
                        selected @endif
                                    @endif
                                    >

                                    {{ $tag->name }}
                                </option>
                            @endforeach

                        </select>
                    </div>
                @endif
                @if (isset($restauransts))
                    @if ($restaurants->count() > 0)
                        <div class="form-group">
                            <label for="restauransts">{{ trans('blog.Restaurants') }}</label>

                            <select name="restaurants" id="restauransts" class="form-control restaurants-selector" multiple>
                                @foreach ($restaurants as $res)
                                    <option value="{{ $res->id }}"
                                        @if (isset($destination)) @if ($destination->hasres($res->id))
                        selected @endif
                                        @endif
                                        >

                                        {{ $res->name }}
                                    </option>
                                @endforeach

                            </select>
                        </div>
                    @endif
                @endif

                <div class="form-group">
                    <button type="submit" class="btn btn-success">
                        {{ isset($destination) ? 'Update Tour' : 'Create Tour' }}
                    </button>
                </div>

            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script>
        flatpickr('#published_at', {
            enableTime: true
        })

        $(document).ready(function() {
            $('.tags-selector').select2();
        });
        flatpickr('#takeoff_date', {
            enableTime: true
        })

        $(document).ready(function() {
            $('.tags-selector').select2();
        });
        $(document).ready(function() {
            $('.restaurants-selector').select2();
        });
    </script>
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
@endsection
