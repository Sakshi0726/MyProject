@extends('layouts.admin')

@section('content')

<div class="row">
<h1>Edit Categories</h1>
	{!!Form::model($category,['method'=>'PATCH','action'=>['AdminCategoriesController@update',$category->id]])!!}
		<div class="form-group">
		{!!Form::label('name','Name:')!!}
		{!!Form::text('name',null,['class'=>'form-control'])!!}
		</div>
		
		<div id="form-group">
		{!!Form::submit('Update Category',['class'=>'btn btn-primary col-sm-3'])!!}
		</div>
	{!!Form::close()!!}
		{!!Form::open(['method'=>'DELETE','action'=>['AdminCategoriesController@destroy',$category->id]])!!}
		<div id="form-group">
		{!!Form::submit('Delete Category',['class'=>'btn btn-danger pull-right'])!!}
		</div>
	{!!Form::close()!!}
	</div>
@endsection