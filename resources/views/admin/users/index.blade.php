@extends('layouts.admin')


@section('content')
	@if(Session::has('deleted_user'))
		<p>{{session('deleted_user')}}</p>
	@endif
	<h1>Users</h1>
	<table class="table">
		<tr>
			<th>ID</th>
			<th>Photo</th>
			<th>Name</th>
			<th>Email</th>
			<th>Role</th>
			<th>Status</th>
			<th>Created</th>
			<th>Updated</th>
		</tr>
	
		@if($users)
			@foreach($users as $user)
		<tr>
			<td>{{$user->id}}</td>
			<td><a href="{{route('admin.users.edit',$user->id)}}"><img height="100px" width="60px" src="{{$user->photo ? $user->photo->file:'No Photo'}}"></a></td>
			<td>{{$user->name}}</td>
			<td>{{$user->email}}</td>
			<td>{{$user->role->name}}</td>
			<td>{{$user->is_active ==1 ? 'Active':'Not Active'}}</td>
			<td>{{$user->created_at->diffForHumans()}}</td>
			<td>{{$user->updated_at->diffForHumans()}}</td>
		</tr>
		@endforeach
		
		@endif
	</table>
@endsection