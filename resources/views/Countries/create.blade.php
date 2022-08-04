@extends('layouts.app')


@section('content')


<div class="card card-default">
   <div class="card-header">
      {{isset($category)? 'Edit country': 'Create country'}}
   </div>
   <div class="card-body">
      @include('partials.errors')

      <form action="{{isset($category) ? route('countries.update', $category->id) :route('countries.store') }}"
         method="POST">
         @csrf
         @if (isset($category))
         @method('PUT')
         @endif
         <div class="form-group">
            <input type="text" id="name" class="form-control" name="name"
               value="{{ isset($category)? $category->name:'' }}">
         </div>

         <div class="form-group">
            <button class="btn btn-success">
               {{isset($category) ? 'Update country' : 'Add country'}}
            </button>
         </div>
      </form>
   </div>

</div>


@endsection