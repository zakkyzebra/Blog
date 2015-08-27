@extends('layouts.master')

@section('head')
	<style>
		#userLog{
			color: white;
		}
	</style>
@stop

@section('content')
	<div class="container topSpace">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                @if (Session::has('errorMessage'))
                    <div class="help-block">{{{Session::get('errorMessage')}}} </div>
                @endif
                <p>Login</p>
				{{ Form::open(array('action' => 'HomeController@doLogin')) }}
					<div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control" placeholder="Email" id="email">
                        </div>
                    </div>
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Password" id="password">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="form-group col-xs-12">
                            <button class="btn btn-default pull-right">Login</button>
                        </div>
                    </div>
                {{ Form::close() }}
			</div>
		</div>
	</div>
@stop