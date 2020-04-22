@extends('layouts.admin')

@section('content')
	@if(Session::has('deleted_category'))
		<p>{{session('deleted_category')}}</p>
	@endif

	<div class="row">
	<h1>Categories</h1>
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
			<td><a href="{{route('admin.categories.edit',$category->id)}}">{{$category->name}}</a></td>
			<td>{{$category->created_at ? $category->created_at->diffForHumans():'no date'}}</td>
			</tr>
		@endforeach
		</table>
		@endif
	</div>
@endsection