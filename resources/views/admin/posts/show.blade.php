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
                        {{-- start show reply --}}
                        @foreach ($replies as $reply)
                        <div class="card-body" style="text-align: left">
                            <h4 class="card-title">{{$reply->replier}}</h4>
                            <p class="card-description">{{$reply->reply}}</p>
                            <h6 class="card-category">add at {{ $reply->created_at->diffForHumans()}}</h6>
                        </div>
                        @endforeach
                        {{-- end show reply --}}
                        {{-- Start reply--}}
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <form>
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="form-group bmd-form-group">
                                                        <textarea class="form-control" rows="1" id="reply"
                                                            name="reply"></textarea>
                                                    </div>
                                                </div>
                                                <input type="hidden" id="replier" name="replier"
                                                    value="{{ Auth::user()->name}}">
                                                <input type="hidden" id="comment_id" name="comment_id"
                                                    value="{{$comment->id}}">
                                                <input type="hidden" id="post_id" name="post_id" value="{{$post->id}}">
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary pull-right btn-submit">Add Reply</button>
                                        <div class="clearfix"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        {{-- end reply--}}
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
@section('script')
<script>
    $(document).ready(function () {
        $('.btn-submit').on('click', function (e) {
            e.preventDefault();
            var _token = $("input[name='_token']").val();
            var reply = $('#reply').val();
            var replier = $('#replier').val();
            var comment_id = $('#comment_id').val();
            var post_id = $('#post_id').val();
            $.ajax({
                url: "{{ route('reply.store') }}",
                type: 'POST',
                data: {
                    _token: _token,
                    reply: reply,
                    replier: replier,
                    comment_id: comment_id,
                    post_id: post_id
                },
                success: function () {
                    location.reload(true);
                }
            });
        });
    });

</script>
@endsection
