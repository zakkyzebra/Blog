@extends('layouts.master')

@section('header')
	<header class="intro-header" style="background-image: url('http://lorempixel.com/1920/650/')">

        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="post-heading">
                        <h1>{{ $post->title }}</h1>
                        <h2 class="subheading">{{ $post->description }}</h2>
                        <span class="meta">Posted on {{ $post->created_at}}</span>
                        <span class="meta">Written by <a href="/?user={{$post->user->username}}">{{ $post->user->first_name}}</a></span>
                    </div>
                </div>
            </div>
        </div>
    </header>
@stop

@section('content')
    <article>
        <div class="container">
            <div class="row">
                    @if (Session::has('errorMessage'))
                        <div class="alert alert-danger">{{{Session::get('errorMessage')}}} </div>
                    @endif
                    @if (Session::has('successMessage'))
                        <div class="alert alert-success">{{{Session::get('successMessage')}}} </div>
                    @endif
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    {{ $post->body }}
                </div>
                @if(Auth::check() && Auth::user()->id === $post->user_id)
                    <a class="btn btn-primary" href="{{{ action('PostsController@edit', $post->id) }}}"><span class="glyphicon glyphicon-pencil"></span></a>
                    <button id="delete" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button>
                @endif

            </div>
            {{ Form::open(array('action' => array('PostsController@destroy', $post->id), 'method' => 'DELETE', 'id' => 'formDelete')) }}
            {{ Form::close() }}
        </div>
    </article>

    <hr>

    {{ Form::open(array('action' => ['PostsController@storeComment', $post->id] )) }}
        <div class="container">
            <div class="row">
                <h4>Leave a Comment:</h4>
                <textarea name="comment" class="form-control" rows="3"></textarea><br>
                <button type="submit" class="btn btn-primary">Submit</button><br><br>
            </div>
        </div>
    {{ Form::close() }}

    @forelse($post->comments as $comment)

        <div class="container">
            <div class="row">
                <h4 class="media-heading">{{{$comment->user->first_name}}} {{{$comment->user->last_name}}}
                    <small>{{{$comment->created_at->setTimezone('America/Chicago')->format('l, F jS Y @ h:i:s a')}}}</small>
                </h4>
                {{{$comment->comment}}}
                @if(Auth::check() && Auth::user()->id === $comment->user_id)
                    <button id="deleteComment" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button>
                @endif
            {{ Form::open(array('action' => array('PostsController@deleteComment', $comment->id), 'method' => 'DELETE', 'id' => 'commentDelete')) }}
            {{ Form::close() }}
            </div>
        </div>

    @empty
    @endforelse

    <hr>

@stop

@section('script')
    <script>
        (function() {
            "use strict";
            $('#delete').on('click', function(){
                var onConfirm = confirm('Are you sure you want to delete?');
                console.log(onConfirm);
                if(onConfirm){
                    document.getElementById("formDelete").submit();
                    console.log('formsubmit');
                }
            });
            $('#deleteComment').on('click', function(){
                var onConfirm = confirm('Are you sure you want to delete?');
                console.log(onConfirm);
                if(onConfirm){
                    document.getElementById("commentDelete").submit();
                    console.log('formsubmit');
                }
            });
        })();
    </script>
@stop