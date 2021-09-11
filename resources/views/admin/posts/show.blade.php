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
        <div class="row">
          <div class="col-md-12">
              <div class="card card-profile" style="text-align: left"> 
                <div style="color:#fff;fontsize:25px">
                  <h1>Comments</h1>
              </div>
                  <div class="card-body">
                    @forelse ($comments as $comment )
                    <h6 class="card-category">Author : {{$comment->commenter}}</h6>
                    <p class="card-description"> {{$comment->comment}}</p>
                    <h6 class="card-category">added at: {{$post->created_at->diffForHumans()}}</h6>
                    @empty
                    <h4 class="card-category">Put Your first comment</h6>
                    @endforelse  
                  </div>
              </div>
          </div>
      </div> 
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Add Your comment here</h4>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{route('comment.store')}}">
                          @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="form-group bmd-form-group">
                                            <textarea class="form-control" rows="5" name="comment"></textarea>
                                        </div>
                                        <input type="hidden" name="commenter" value="{{Auth::user()->name}}">
                                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                        <input type="hidden" name="post_id" value="{{$post_id}}">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary pull-right">add comment</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
