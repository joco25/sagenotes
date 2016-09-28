@extends('layouts.base')
@section('content')
<div class="container">
<h1>Edit Notebook</h1>
	<form action="/notebooks/{{$notebook->id}}" method="POST">
		{{csrf_field()}}
		{{method_field('PUT')}}
		
		<div class="form-group">
			<label for="name">Notebook Name</label>
			<input type="text" name="name" class="form-control">
		</div>
		<input type="submit" class="btn btn-primary" value="Update">
	</form>
	
</div>

@stop