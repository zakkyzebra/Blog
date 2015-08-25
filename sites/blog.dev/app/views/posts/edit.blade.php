@extends('layouts.master1')

@section('content')
	{{ Form::model($post,array('action' => array('PostsController@update', $post->id), 'method' => 'PUT')) }}
	{{ Form::label('title', 'Title') }}
	{{ Form::text('title') }}
	{{ Form::label('description', 'Description') }}
	{{ Form::text('description') }}
	{{ Form::label('body', 'Body') }}
	{{ Form::text('body') }}

	{{ Form::submit('Submit') }}

	{{ Form::close() }}

@stop