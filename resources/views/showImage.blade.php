@extends('layout')
@section('title')
Image
@endsection
@section('content')
     <a href="{{route('user.create')}}" class="btn btn-sm btn-success my-2 mt-5">Add New Image</a>
     <div class="row">
      @foreach ($users as $user)
      <div class="col-md-3">
        <img src="{{asset('storage/' .$user->file_upload)}}" style="width:250px; height:200px" class="image-fluid img-thumbnail"   alt="">
        <div class="d-flex gap-2 ml-2 mt-3 mr-auto">
            <a href="{{route('user.edit',$user->id)}}" class="btn btn-sm btn-warning">Update</a>
            <form method="POST" action="{{route('user.destroy',$user->id)}}">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm" >Delete</button>
            </form>
        </div>
    </div>
      @endforeach
     </div>
@endsection