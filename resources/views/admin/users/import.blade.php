@extends('layouts.admin')
@section('content')
<div class="container">
    <form method="post" action="{{route('user.import')}}"  enctype="multipart/form-data">
        @csrf
        {{-- {{ csrf_field() }} --}}
        <div class="mb-3">
            <label class="form-label">Import users</label>
            <input type="file" name="file" class="form-control">
        </div>
        <button id="save-user" class="btn btn-primary">Import Data</button>
        <a class="btn btn-dark" href="{{route('user.index')}}">back</a>
    </form>
</div> 
@endsection