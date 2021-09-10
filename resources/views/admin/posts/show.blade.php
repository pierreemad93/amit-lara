@extends('layouts.admin')
@section('content')
<div class="content">
    <div class="container-fluid">
      <div class="row">

        <div class="col-md-12">
          <div class="card card-profile">
            <div class="card-avatar">
              <a href="#pablo">
                <img class="img" src="{{URL::asset('adminpanel/img')}}/{{$post->image}}">
              </a>
            </div>
            <div class="card-body">
              <h6 class="card-category">Author : {{$post->author}}</h6>
              <h4 class="card-title">{{$post->title}}</h4>
              <p class="card-description"> {{$post->desc}}</p>
              <h6 class="card-category">added at: {{$post->created_at->diffForHumans()}}</h6>
              <a class="btn btn-primary" href="{{route('post.index')}}">Back</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection