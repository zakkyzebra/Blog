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
                    {{ $errors->first('title', '<div class="help-block">:message</div>') }}
    				{{ $errors->first('description', '<div class="help-block">:message</div>') }}
    				{{ $errors->first('body', '<div class="help-block">:message</div>') }}
                @endif
                <p>Edit blog post</p>
				{{ Form::model($post,array('action' => array('PostsController@update', $post->id), 'method' => 'PUT')) }}
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control" placeholder="Title" value="{{{ $post->title }}}" id="title">
                        </div>
                    </div>
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Description</label>
                            <input type="textarea" name="description" class="form-control" placeholder="Description" value="{{{ $post->description }}}" id="description">
                        </div>
                    </div>
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Body</label>
                            <textarea class="form-control" rows="10" name="body" placeholder="Body" id="body">{{{$post->body}}}</textarea>
                        </div>
                    </div>
					<div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Tags</label>
                            <?php $arrays = $post->tags; ?>
                            @foreach ($arrays as $array) 
                                <?php $oldtags[] = $array->name;?>
                            @endforeach
                            <?php $oldtags = implode(',', $oldtags);?>

                            <input type="text" name="tags" class="form-control" placeholder="Tags" value="{{$oldtags}}" id="tags">
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

@section('script')
    <script type="text/javascript" src="/ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="/ckeditor/adapters/jquery.js"></script>
    <script>
        $('#body').ckeditor();
    </script>
@stop
