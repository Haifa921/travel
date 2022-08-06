@extends('layouts.app')

@section('content')
    <div class="card card-default">
        <div class="card-header">
            {{ isset($place) ? 'Edit Tourist Place' : 'Create Tourist Place' }}
        </div>

        <div class="card-body">
            @include('partials.errors')
            <form action="{{ isset($place) ? route('places.update', $place->id) : route('places.store') }}"
                method="POST" enctype="multipart/form-data">
                @csrf

                @if (isset($place))
                    @method('PUT')
                @endif

                <div class="form-group">
                    <label for="name">{{ trans('blog.name') }}</label>
                    <input type="text" class="form-control" name="name" id="name"
                        value="{{ isset($place) ? $place->name : '' }}">
                </div>

                <div class="form-group">
                    <label for="Description">{{ trans('blog.Description') }}</label>
                    <textarea name="description" class="form-control" name="description" id="description" cols="5" rows="5">{{ isset($place) ? $place->description : '' }}</textarea>
                </div>

                {{-- <div class="form-group">
                    <label for="content">{{ trans('blog.Content') }}</label>
                    <input id="content" type="hidden" name="content"
                        value="{{ isset($place) ? $place->content : '' }}">
                    <trix-editor input="content"></trix-editor>
                </div> --}}

                {{-- <div class="form-group">
                    <label for="published_at">{{ trans('blog.Published_At') }} </label>
                    <input type="text" class="form-control" name="published_at" id="published_at"
                        value="{{ isset($place) ? $place->published_at : '' }}"">
                </div> --}}
                @if (isset($place))
                    <h4>Existed Images</h4>
                    <div class=" form-group row">
                    @foreach ($place->media as $p)
                        <img class="col" src="{{ asset($p->file_path) }}" alt="" style="width: 50 %">
                    @endforeach
                    </div>
                @endif

                <div class="form-group">
                    <label for="image">{{ trans('blog.Image') }}</label>
                    <input type="file" class="form-control" name="images[]" id="image" multiple>
                </div>

                <div class="form-group">
                    <label for="country">{{ trans('blog.Country') }}</label>
                    <select name="country_id" id="country" class="form-control">
                        @foreach ($countries as $country)
                            <option value="{{ $country->id }}"
                                @if (isset($place)) @if ($country->id === $country->country_id)
                        selected @endif
                                @endif
                                >
                                {{ $country->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="category">{{ trans('blog.Category') }}</label>
                    <select name="category_id" id="category" class="form-control">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                @if (isset($place)) @if ($category->id === $category->category_id)
                        selected @endif
                                @endif
                                >
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-success">
                        {{ isset($place) ? 'Update Place' : 'Create Place' }}
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
    </script>
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
@endsection
