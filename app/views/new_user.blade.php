@extends('layouts.master')

@section('head')
	<link href="/css/navbar.css" rel="stylesheet">
@stop

@section('content')
	<div class="container topSpace">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                @if (Session::has('errorMessage'))
                    <div class="help-block">{{{Session::get('errorEmail')}}} </div>
                    <div class="help-block">{{{Session::get('errorPassword')}}} </div>
                @endif
                @if($errors->has())        
                    {{ $errors->first('username', '<div class="help-block">:message</div>') }}
    				{{ $errors->first('first_name', '<div class="help-block">:message</div>') }}
    				{{ $errors->first('last_name', '<div class="help-block">:message</div>') }}
    				{{ $errors->first('email', '<div class="help-block">:message</div>') }}
    				{{ $errors->first('password', '<div class="help-block">:message</div>') }}
                @endif
                <p>Create a user</p>
				{{ Form::open(array('action' => 'UsersController@newUser')) }}
					*Required
					<div class="row control-group">
	                        <div class="form-group col-xs-12 floating-label-form-group controls">
								{{ Form::label('username', 'Username') }}
								{{ Form::text('username', Input::old('username'), array('placeholder' => 'Username*')) }}
							</div>
					</div>
					<div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
								{{ Form::label('first_name', 'First name') }}
								{{ Form::text('first_name', Input::old('first_name'), array('placeholder' => 'First Name*')) }}
							</div>
					</div>
					<div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
								{{ Form::label('last_name', 'Last name') }}
								{{ Form::text('last_name', Input::old('last_name'), array('placeholder' => 'Last Name')) }}
							</div>
					</div>
					<div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
								{{ Form::label('email', 'Email') }}
								{{ Form::text('email', null, array('placeholder' => 'Email*')) }}
							</div>
					</div>
					<div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
								{{ Form::label('email_confirmation', 'Email') }}
								{{ Form::text('email_confirmation', null, array('placeholder' => 'Confirm Email*')) }}
							</div>
					</div>
					<div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
								{{ Form::label('password', 'Password') }}
								{{ Form::password('password', array('placeholder' => 'Password*')) }}
							</div>
					</div>
					<div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
								{{ Form::label('password_confirmation', 'Confirm Password') }}
								{{ Form::password('password_confirmation', array('placeholder' => 'Confirm Password*')) }}
							</div>
					</div>
					<br>
					<div class="row">
                        <div class="form-group col-xs-12">
							{{ Form::submit('Create new user')}}
						</div>
					</div>
				{{ Form::close()}}
@stop