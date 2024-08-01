@extends('layout')

@section('content')
 <h1 class="mt-5 mb-5">ADD Image Here:</h1>
<form method="POST" action="{{route('user.update',$user->id)}}" enctype="multipart/form-data" class="d-flex flex-column">
   @csrf
   @method('PUT')
   <img id="output" src="{{asset('storage/' .$user->file_upload)}}" style="width:250px; height:200px" class="image-fluid img-thumbnail"   alt="">
   <input type="file"  onchange="document.querySelector('#output').src=window.URL.createObjectURL(this.files[0])" name="photo" accept="image/* " class="form-group mb-2">
   <div class="d-flex mr-auto">
       <button class="btn btn-sm btn-warning mt-2 ">Update Image</button>
   </div>
</form>
@endsection