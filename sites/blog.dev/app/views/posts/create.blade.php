@extends('layouts.master1')


@section('content')

	{{ $errors->first('title', '<div class="help-block">:message</div>') }}

	{{ $errors->first('body', '<div class="help-block">:message</div>') }}

	{{ Form::open(array('action' => 'PostsController@store')) }}
		{{ Form::label('title', 'Title') }}
		{{ Form::text('title') }}<br><br>
		{{ Form::label('description', 'Description') }}
		{{ Form::text('description') }}<br><br>
		{{ Form::label('body', 'Body') }}
		{{ Form::textarea('body') }}<br><br><br>
		{{ Form::submit('Submit') }}
	{{ Form::close() }}

@stop