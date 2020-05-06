@extends('layouts.admin')

@section('content')
@if(Session::has('deleted_media'))
		<p>{{session('deleted_media')}}</p>
	@endif
<h1>Media</h1>
@if($photos)
	<form action="/code_hacking/public/delete/media" method="post" class="form-inline">
		<div class="form-group">
			<input type="submit" class="btn btn-primary">
		</div><br/><br/>
<table class="table">
	<tr>
		<th><input type="checkbox" id="options"></th>
		<th>ID</th>
		<th>Name</th>
		<th>Created</th>
	</tr>
	@foreach($photos as $photo)
	<tr>
		<td><input class="checkBoxes" type="checkbox" name="checkBoxArray[]" value="{{$photo->id}}"></td>
		<td>{{$photo->id}}</td>
		<td><img src="{{$photo->file}}" height="100"></td>
		<td>{{$photo->created_at ? $photo->created_at->diffForHumans() : 'No Date' }}</td>
	</tr>
	@endforeach
</table>
</form>
@endif
@section('scripts')
<script>
$(document).ready(function(){
	$('#options').click(function(){
		if(this.checked){
			$('.checkBoxes').each(function(){
				this.checked=true;
			});
		}else{
			$('.checkBoxes').each(function(){
				this.checked=false;
			});
		}
	});
});
</script>
@endsection
@endsection