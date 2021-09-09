@extends('layouts.admin')
@section('content')
<div class="container">
    <form method="post" action="{{route('post.store')}}"  enctype="multipart/form-data">
        @csrf
        {{-- {{ csrf_field() }} --}}
        <div class="mb-3">
            <label class="form-label">title</label>
            <input type="text" class="form-control" name="title">
            @error('title')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea  class="form-control" name="desc"></textarea>
            @error('desc')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Upload image</label>
            <input type="file" class="form-control" name="image">
            @error('image')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Author</label>
            <input type="text" class="form-control" value="{{Auth::user()->name}}" name="author">
            @error('author')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-3">
            <input type="hidden" class="form-control" value="{{Auth::user()->id}}" name="user_id">
        </div>
        <button id="save-user" class="btn btn-primary">Submit</button>
        <a class="btn btn-dark" href="{{route('user.index')}}">back</a>
    </form>
</div>
@endsection