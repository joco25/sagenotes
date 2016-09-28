@extends('layouts.base')
@section('content')
<div class="container">
<h1>Create Notebook</h1>
	<form action="/notebooks" method="POST">
		{{csrf_field()}}
		
		<div class="form-group">
			<label for="name">Notebook Name</label>
			<input type="text" name="name" class="form-control">
		</div>
		<input type="submit" class="btn btn-primary" value="Done">
	</form>
	
</div>

@stop