@extends('layouts.admin')
@section('content')
<div class="container">
    <form>
        <div class="mb-3">
            <label class="form-label">username</label>
            <input class="form-control" value="{{$user->name}}">
        </div>
        <div class="mb-3">
            <label class="form-label">Email address</label>
            <input class="form-control" value="{{$user->email}}">
        </div>
        <a class="btn btn-dark" href="{{route('user.index')}}">back</a>
    </form>
</div>
@endsection
