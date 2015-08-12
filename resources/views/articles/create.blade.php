@extends('app')

@section('content')

	<h1>New Article</h1>

	<hr/>

	@include ('errors.list')

	{!! Form::open(['url'=>'articles']) !!}
		
	
		@include ('articles.form',['submitButtonText' => 'Add Article'])

	{!! Form::close() !!}


@stop