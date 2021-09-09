@extends('layouts.admin')
@section('content')
@section('title') 
       {{$user->name}}  Posts
@endsection
<table class="table">
    <thead>
        <tr>
            <th>profile pic</th>
            <th>Title</th>
            <th>created at</th>
            <th>action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($posts as $post )
        <tr>
            <th><img src="{{URL::asset('adminpanel/img')}}/{{$post->image}}" style="height: 10vh"></th>
            <th>{{$post->title}}</th>
            <td>{{$post->created_at}}</td>
            <td>
            
                <div class="d-flex">
                    <a class="btn btn-info" href="{{route('post.show' , $post->id)}}">Show</a>
                    <a class="btn btn-warning" href="{{route('post.edit' , $post->id)}}">edit</a>
                   {{--Start delete button --}}
                    <form method="POST" action="{{route('post.destroy' , $post->id)}}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                    {{--end delete button --}}
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<a class="btn btn-primary" href="{{route('post.create')}}">Add Post</a>
@endsection