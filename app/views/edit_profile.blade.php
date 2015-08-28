@extends('layouts.master')

@section('head')
    <link href="/css/navbar.css" rel="stylesheet">
@stop

@section('content')

	<div class="container topSpace">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                @if (Session::has('errorMessage'))
                    <div class="">{{{Session::get('errorMessage')}}} </div>
                @endif
                @if($errors->has())        
                    {{ $errors->first('username', '<div class="help-block">:message</div>') }}
                    {{ $errors->first('first_name', '<div class="help-block">:message</div>') }}
                    {{ $errors->first('last_name', '<div class="help-block">:message</div>') }}
                    {{ $errors->first('email', '<div class="help-block">:message</div>') }}
                    {{ $errors->first('password', '<div class="help-block">:message</div>') }}
                @endif
                <p>Edit profile</p>
                {{ Form::model($user,array('action' => array('UsersController@editProfile'), 'method' => 'PUT')) }}
					<div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>First name</label>
                            <input type="text" name="first_name" class="form-control" placeholder="First name" value="{{$user->first_name}}"  id="first_name">
                        </div>
                    </div>
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Last name</label>
                            <input type="text" name="last_name" class="form-control" placeholder="Last name" value="{{$user->last_name}}"  id="last_name">
                        </div>
                    </div>
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Change Email</label>
                            <input type="text" name="email" class="form-control" placeholder="Email" id="email">
                        </div>
                    </div>
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Email confirmation</label>
                            <input type="text" name="email_confirmation" class="form-control" placeholder="Email Confirmation"  id="email_confirmation">
                        </div>
                    </div>
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Current Password</label>
                            <input type="password" name="current_password" class="form-control" placeholder="Current Password"  id="current_password">
                        </div>
                    </div>
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Password"  id="password">
                        </div>
                    </div>
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Password Confirmation</label>
                            <input type="password" name="password_confirmation" class="form-control" placeholder="Password Confirmation"  id="password_confirmation">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="form-group col-xs-12">
                            <button class="btn btn-default">Post</button>
                        </div>
                    </div>
                {{ Form::close() }}
			</div>
		</div>
	</div>

@stop