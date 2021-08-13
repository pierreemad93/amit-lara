@extends('layouts.admin')
@section('content')
<div class="container">
    <form method="POST" action="{{route('user.update' , $user->id)}}">
        @csrf
        {{-- {{ csrf_field() }} --}}
        @method('PUT')
        {{-- {{ method_field('PUT') }} --}}
        <div class="mb-3">
            <label class="form-label">username</label>
            <input type="text" class="form-control" value="{{$user->name}}" name="name">
            @error('name')
                <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Email address</label>
            <input type="email" class="form-control" value="{{$user->email}}" name="email">
            @error('email')
                <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">password</label>
            <input type="password" class="form-control" value="{{$user->password}}" name="password">
            @error('password')
                <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <a class="btn btn-dark" href="{{route('user.index')}}">back</a>
    </form>
</div>
@endsection
