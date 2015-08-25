@extends('layouts.master')

@section('header')
	<header class="intro-header" style="background-image: url('img/home-bg.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="site-heading">
                        <h1>Clean Blog</h1>
                        <hr class="small">
                        <span class="subheading">A Clean Blog Theme by Start Bootstrap</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
@stop

@section('content')
    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                @foreach ($posts as $post)
                    <div class="post-preview">
                        <a href="posts/{{ $post->id }}">
                            <h2 class="post-title">
                                {{$post->title}}
                            </h2>
                            <h3 class="post-subtitle">
                                {{$post->description}}
                            </h3><br>
                        </a>
                        <p class="post-meta">Created on
                           	{{$post->created_at}}
                        </p>
                        <p class="post-meta">Updated on
                           	{{$post->updated_at}}
                        </p>
                    </div>
                    <hr>
                @endforeach
                {{ $posts->links() }}
            </div>
        </div>
    </div>

    <hr>
@stop









