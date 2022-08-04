@extends('layouts.app')

@section('content')
    <div class="card card-default">
        <div class="card-header">
            {{ isset($destinations) ? 'Edit Tourist Place' : 'Create Tourist Place' }}
        </div>

        <div class="card-body">
            @include('partials.errors')
            <form action="{{ isset($destination) ? route('places.update', $destinations->id) : route('places.store') }}"
                method="POST" enctype="multipart/form-data">
                @csrf

                @if (isset($destination))
                    @method('PUT')
                @endif

                <div class="form-group">
                    <label for="name">name</label>
                    <input type="text" class="form-control" name="name" id="name"
                        value="{{ isset($destinations) ? $destinations->name : '' }}">
                </div>

                <div class="form-group">
                    <label for="Description">Description</label>
                    <textarea name="description" class="form-control" name="description" id="description" cols="5" rows="5">{{ isset($destination) ? $destination->description : '' }}</textarea>
                </div>

                {{-- <div class="form-group">
                    <label for="content">Content</label>
                    <input id="content" type="hidden" name="content"
                        value="{{ isset($destination) ? $destination->content : '' }}">
                    <trix-editor input="content"></trix-editor>
                </div> --}}

                {{-- <div class="form-group">
                    <label for="published_at">Published At</label>
                    <input type="text" class="form-control" name="published_at" id="published_at"
                        value="{{ isset($destination) ? $destination->published_at : '' }}"">
                </div> --}}
                @if (isset($destination))
                    <div class=" form-group">
                        <img src="{{ asset($destination->image) }}" alt="" style="width: 100%">
                    </div>
                @endif

                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" class="form-control" name="images[]" id="image" multiple>
                </div>

                <div class="form-group">
                    <label for="country">Country</label>
                    <select name="country_id" id="country" class="form-control">
                        @foreach ($countries as $country)
                            <option value="{{ $country->id }}"
                                @if (isset($destinations)) @if ($country->id === $country->country_id)
                        selected @endif
                                @endif
                                >
                                {{ $country->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="category">Category</label>
                    <select name="category_id" id="category" class="form-control">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                @if (isset($destinations)) @if ($category->id === $category->category_id)
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
                        {{ isset($destination) ? 'Update Destination' : 'Create Destination' }}
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
