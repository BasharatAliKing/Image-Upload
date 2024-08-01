@extends('layout')

@section('content')
 <h1 class="mt-5 mb-5">ADD Image Here:</h1>
<form method="POST" action="{{route('user.store')}}" enctype="multipart/form-data" class="d-flex flex-column">
   @csrf
  <input type="file" name="photo" accept="image/* " class="form-group mb-2">
   <div class="d-flex mr-auto">

       <button class="btn btn-sm btn-success mt-2 ">Add Image</button>
   </div>
</form>
@endsection