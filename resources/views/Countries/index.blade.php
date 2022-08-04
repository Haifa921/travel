@extends('layouts.app')


@section('content')

<div class="d-flex justify-content-end mb-2">
   <a href="{{route('countries.create')}}" class="btn btn-success ">Add Country</a>
</div>
<div class="card card-default">
   <div class="card-header">Countries</div>
   <div class="card-body">
      @if ($countries->count()>0)
      <table class="table">
         <thead>
            <th>Name</th>
            <th>Tourist places Count</th>
            <th>Tours Count</th>
            <th></th>
         </thead>

         <tbody>
            @foreach ($countries as $country )
            <tr>
               <td>
                  {{$country->name}}
               </td>
               <td>
                  {{$country->touristPlaces()->count() }}
               </td>
               <td>
                  {{$country->tours()->count() }}
               </td>
               <td>
                  <a href="{{ route('countries.edit', $country->id) }}" class="btn btn-info btn-sm">
                     Edit
                  </a>
                  <button class="btn btn-danger btn-sm" onclick="handleDelete({{$country->id}})">Delete</button>
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
                     <h5 class="modal-title" id="deleteModalLabel">Delete Country</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
                  <div class="modal-body">
                     <p class="text-center text-bold">
                        Are you sure you want to delete this Country?
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
      <h3 class="text-center">No Countries Yet</h3>
      @endif
   </div>
</div>
@endsection


@section('scripts')
<script>
   function handleDelete(id){
      var form = document.getElementById('deleteCategoryForm')
      form.action= '/countries/' +id
      $('#deleteModal').modal('show')
   }

</script>

@endsection