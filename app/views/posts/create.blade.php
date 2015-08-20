@extends('layouts.master1')

@section('content')
@if(!empty($input))
	<? var_dump($input) ?>
@endif

	<form action="{{{action('PostsController@store') }}}" method="POST" accept-charset="utf-8">
		<input name="title" placeholder="title" type="text"><br>
		<textarea name="body" placeholder="body" rows="5"></textarea>
		<input type="submit">
	</form>


@stop