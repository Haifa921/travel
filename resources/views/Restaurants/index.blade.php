@extends('layouts.app')


@section('content')

<div class="d-flex justify-content-end mb-2">
   <a href="{{route('restaurants.create')}}" class="btn btn-success ">{{ trans('blog.Add_Restaurant') }} </a>
</div>
<div class="card card-default">
   <div class="card-header">{{ trans('blog.restaurants') }}</div>
   <div class="card-body">
      @if ($restaurants->count()>0)
      <table class="table">
         <thead>
            <th>{{ trans('blog.Name') }}</th>
            <th>{{ trans('blog.country') }}  </th>
            <th>{{ trans('blog.Stars') }} </th>
            <th>{{ trans('blog.Location') }} </th>
            <th>{{ trans('blog.phone') }} </th>
            <th></th>
         </thead>

         <tbody>
            @foreach ($restaurants as $restaurant )
            <tr>
               <td>
                  {{$restaurant->name}}
               </td>
               <td>
                  {{$restaurant->country->name }}
               </td>
               <td>
                  {{$restaurant->stars }}
               </td>
               <td>
                  {{$restaurant->location }}
               </td>
               <td>
                  {{$restaurant->phone }}
               </td>
               <td>
                  <a href="{{ route('restaurants.edit', $restaurant->id) }}" class="btn btn-info btn-sm">
                  {{ trans('blog.Edit') }}  
                  </a>
                  <button class="btn btn-danger btn-sm" onclick="handleDelete({{$restaurant->id}})">
                  {{ trans('blog.Delete') }}</button>
               </td>
            </tr>
            @endforeach

         </tbody>


         
      </table>


      <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel">
         <div class="modal-dialog">
            <form action="" method="POST" id="deleteCategoryForm">
               @csrf

               @method('DELETE')
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title" id="deleteModalLabel">Delete restaurant</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
                  <div class="modal-body">
                     <p class="text-center text-bold">
                        Are you sure you want to delete this restaurant?
                     </p>
                  </div>
                  <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">No, go back</button>
                     <button type="submit" class="btn btn-danger">Yes,Delete</button>
                  </div>
               </div>
            </form>
         </div>
      </div>

      @else
      <h3 class="text-center">No restaurants Yet</h3>
      @endif
   </div>
</div>
@endsection


@section('scripts')
<script>
   function handleDelete(id){
      var form = document.getElementById('deleteCategoryForm')
      form.action= '/restaurants/' +id
      $('#deleteModal').modal('show')
   }

</script>

@endsection