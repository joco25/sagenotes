@extends('layouts.base')
@section('content')
<div class="container">
<h1>Create Note</h1>
	
	@if(count($errors)>0)
	
		<ul class="list-unstyled">
			@foreach($errors->all() as $error)
			<li class="alert alert-danger">{{$error}}</li>
			@endforeach
		</ul>

	@endif
	
	<form action="{{route('notes.store')}}" method="POST">
		{{csrf_field()}}
		
		<div class="form-group">
			<label for="title">Note Title</label>
			<input type="text" name="title" class="form-control">
		</div>
		<div class="form-group">
			<label for="title">Note Body</label>
			<textarea name="body" name="body" rows="2" cols="30" class="form-control" placeholder="Enter Note Here"> </textarea>
		</div>

		<input type="hidden" name="notebook_id" value="{{$id}}">

		<input type="submit" class="btn btn-primary" value="Done">
	</form>
	
</div>

@stop