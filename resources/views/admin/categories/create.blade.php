@extends('layouts.admin')

@section('content')

<div class="row">
<h1>Create Category</h1>
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
@endsection