@extends('layouts.blog-post')


@section('content')
<div id="outer">
    <!-- Blog Post -->

                <!-- Title -->
                <h1>{{$post->title}}</h1>

                <!-- Author -->
                <p class="lead">
                    by <a href="#">{{$post->user->name}}</a>
                </p>

                <hr>

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> Posted on {{$post->created_at->diffForHumans()}}</p>

                <hr>

                <!-- Preview Image -->
                <img class="img-responsive" src="{{$post->photo->file}}" alt="">

                <hr>

                <!-- Post Content -->
                <p>{{$post->body}}</p>

                <hr>
					@if(Session::has('comment_message'))
						<p>{{session('comment_message')}}</p>
					@endif
                <!-- Blog Comments -->
@if(Auth::check())
                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
					{!!Form::open(['method'=>'POST','action'=>'PostCommentsController@store'])!!}
						<input type="hidden" name="post_id" value="{{$post->id}}">
						<div class="form-group">
						{!!Form::label('body','Body:')!!}
						{!!Form::textarea('body',null,['class'=>'form-control','rows'=>3])!!}
						</div>
						<div class="form-group">
						{!!Form::submit('Submit Comment',['class'=>'btn btn-primary'])!!}
						</div>
					{!!Form::close()!!}
                    
                </div>
@endif
                <hr>

                <!-- Posted Comments -->
@if(count($comments)>0)
	@foreach($comments as $comment)
                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img height="64px" width="64px" class="media-object" src="{{$comment->photo}}" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">{{$comment->author}}
                            <small>{{$comment->created_at->diffForHumans()}}</small>
                        </h4>
                        {{$comment->body}}
						
						
					</div>
					</div>
					
	@endforeach
@endif
</div>
@endsection