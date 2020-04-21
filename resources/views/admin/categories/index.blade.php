@extends('layouts.admin')

@section('content')
<h1>Categories</h1>
	<div class="col-sm-6">
	{!!Form::open(['method'=>'POST','action'=>'AdminCategoriesController@store'])!!}
		<div class="form-group">
		{!!Form::label('name','Name:')!!}
		{!!Form::text('name',null,['class'=>'form-control'])!!}
		</div>
		
		<div id="form-group">
		{!!Form::submit('Create Category',['class'=>'btn btn-primary'])!!}
		</div>
	{!!Form::close()!!}
	</div>
	<div class="col-sm-6">
		<table class="table">
			<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Created</th>
			</tr>
		@if($categories)
		@foreach($categories as $category)
			<tr>
			<td>{{$category->id}}</td>
			<td>{{$category->name}}</td>
			<td>{{$category->created_at ? $category->created_at->diffForHumans():'no date'}}</td>
			</tr>
		@endforeach
		</table>
		@endif
	</div>
@endsection