@extends('layouts.master')


@section('content')

	<div class="container topSpace">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
				{{ $errors->first('title', '<div class="help-block">:message</div>') }}

				{{ $errors->first('body', '<div class="help-block">:message</div>') }}
                <p>Submit a new blog post</p>
				{{ Form::open(array('action' => 'PostsController@store')) }}
					<div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control" placeholder="Title" id="title">
                        </div>
                    </div>
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Description</label>
                            <input type="textarea" name="description" class="form-control" placeholder="Description" id="description">
                        </div>
                    </div>
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Body</label>
                            <textarea class="form-control" name="body" placeholder="Body" id="body"></textarea>
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