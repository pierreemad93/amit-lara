@extends('layouts.admin')
@section('content')
<div class="container">
    <form method="POST" action="{{route('user.store')}}" enctype="multipart/form-data">
        @csrf
        {{-- {{ csrf_field() }} --}}
        <div class="mb-3">
            <label class="form-label">username</label>
            <input type="text" class="form-control @error('name') alert alert-danger @enderror" name="name">
            @error('name')
                <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Email address</label>
            <input type="email" class="form-control @error('email') alert alert-danger @enderror" name="email">
            @error('email')
                <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">password</label>
            <input type="password" class="form-control @error('password') alert alert-danger @enderror" name="password">
            @error('password')
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
        <button type="submit" class="btn btn-primary">Submit</button>
        <a class="btn btn-dark" href="{{route('user.index')}}">back</a>
    </form>
</div>
@endsection
