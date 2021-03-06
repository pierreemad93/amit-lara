@extends('layouts.admin')
@section('content') 
<table class="table">
    <thead>
        <tr>
            <th>profile pic</th>
            <th>username</th>
            <th>email</th>
            <th>created at</th>
            <th>action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user )
        <tr>
            <th><img src="{{URL::asset('adminpanel/img')}}/{{$user->image}}" style="height: 10vh"></th>
            <th>{{$user->name}}</th>
            <td>{{$user->email}}</td>
            <td>{{$user->created_at}}</td>
            {{-- <td>
                <div class="d-flex">
                    <a class="btn btn-info" href="{{route('user.show' , $user->id)}}">Show</a>
                    <a class="btn btn-warning" href="{{route('user.edit' , $user->id)}}">edit</a>
                    <form method="POST" action="{{route('user.destroy' , $user->id)}}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </td> --}}
        </tr>
        @endforeach
    </tbody>
</table>
@endsection