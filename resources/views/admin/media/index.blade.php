@extends('layouts.admin')

@section('content')
@if(Session::has('deleted_media'))
		<p>{{session('deleted_media')}}</p>
	@endif
<h1>Media</h1>
@if($photos)
<table class="table">
	<tr>
		<th>ID</th>
		<th>Name</th>
		<th>Created</th>
		<th></th>
	</tr>
	@foreach($photos as $photo)
	<tr>
		<td>{{$photo->id}}</td>
		<td><img src="{{$photo->file}}" height="100"></td>
		<td>{{$photo->created_at ? $photo->created_at->diffForHumans() : 'No Date' }}</td>
		<td>{!!Form::open(['method'=>'DELETE','action'=>['AdminMediaController@destroy',$photo->id]])!!}
	<div class="form-group">
	{!!Form::submit('Delete',['class'=>'btn btn-danger'])!!}
	</div>
	
{!!Form::close()!!}
</td>
	</tr>
	@endforeach
</table>
@endif
@endsection