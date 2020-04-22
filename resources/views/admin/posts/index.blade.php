@extends('layouts.admin')

@section('content')
	@if(Session::has('deleted_post'))
		<p>{{session('deleted_post')}}</p>
	@endif
<h1>Posts</h1>
<table class="table">
		<tr>
			<th>ID</th>
			<th>Photo</th>
			<th>Owner</th>
			<th>Category</th>
			<th>Title</th>
			<th>Body</th>
			<th>Created</th>
			<th>Updated</th>
		</tr>
	
		@if($posts)
			@foreach($posts as $post)
		<tr>
			<td>{{$post->id}}</td>
			<td><a href="{{route('admin.posts.edit',$post->id)}}"><img height="100" src="{{$post->photo ? $post->photo->file : 'sakshi'}}"></a></td>
			<td>{{$post->user->name}}</td>
			<td>{{$post->category ? $post->category->name:'Uncategoried'}}</td>
			<td>{{$post->title}}</td>
			<td>{{str_limit($post->body,30)}}</td>
			<td>{{$post->created_at->diffForHumans()}}</td>
			<td>{{$post->updated_at->diffForHumans()}}</td>
		</tr>
		@endforeach
		
		@endif
	</table>
@endsection