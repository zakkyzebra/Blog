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
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    {{ $post->body }}
                </div>
                <a class="btn btn-primary" href="{{{ action('PostsController@edit', $post->id) }}}"><span class="glyphicon glyphicon-pencil"></span></a>
                <button id="delete" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button>
            </div>
            {{ Form::open(array('action' => array('PostsController@destroy', $post->id), 'method' => 'DELETE', 'id' => 'formDelete')) }}
            {{ Form::close() }}
        </div>
    </article>

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
            })
        })();
    </script>
@stop