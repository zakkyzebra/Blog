@extends('layouts.master')

@section('header')
	<header class="intro-header" style="background-image: url('img/home-bg.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="site-heading">
                        <h1>
                            @if (Session::has('updatedProfile'))
                                <div class="">{{{Session::get('updatedProfile')}}} </div>
                            @elseif(Input::has('user'))
                                {{Input::get('user')}}'s Post
                            @elseif(Input::has('search'))
                                Searching for: {{Input::get('search')}}
                            @elseif(Input::has('tag'))
                                Related posts to tag: {{Input::get('tag')}}
                            @elseif(Auth::check())
                                Welcome, {{ Auth::user()->username }}
                            @else
                                Welcome to BlogBlogBlog
                            @endif
                        </h1>
                        <hr class="small">
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
                <div class="dropdown navbar-right">
                    <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    Posts per page:{{Input::get('p')}}
                        <span class="caret"></span>
                    </button>
                    @if(Input::has('search') || Input::has('tag') || Input::has('user'))
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                            <li><a href="{{Post::urlBuilder()}}&p=5">5</a></li>
                            <li><a href="{{Post::urlBuilder()}}&p=10">10</a></li>
                            <li><a href="{{Post::urlBuilder()}}&p=15">15</a></li>
                            <li><a href="{{Post::urlBuilder()}}&p=20">20</a></li>
                        </ul>
                    @else
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                            <li><a href="?p=5">5</a></li>
                            <li><a href="?p=10">10</a></li>
                            <li><a href="?p=15">15</a></li>
                            <li><a href="?p=20">20</a></li>
                        </ul>
                    @endif
                </div>
                    @forelse ($posts as $post)
                        <div class="post-preview">
                            <a href="posts/{{ $post->id }}">
                                <h2 class="post-title">
                                    {{$post->title}}
                                </h2>
                                <h3 class="post-subtitle">
                                    {{$post->description}}
                                </h3><br>
                            </a>
                            <p class="post-meta">
                                Written by <a href="?user={{$post->user->username}}">{{$post->user->first_name}}</a>
                            </p>
                            <p class="post-meta">
                                Created on
                               	    {{$post->created_at}}<br>
                                Updated on
                               	    {{$post->updated_at}}
                            </p>
                        </div>
                        <hr>
                    @empty
                    <h1 class="help-block">No results found</h1>
                    @endforelse
                    @if(Input::has('user') && !empty($posts))
                        {{$posts->appends(array('user' => Input::get('user')))->links() }}
                    @elseif(Input::has('search'))
                        {{$posts->appends(array('search' => Input::get('search')))->links() }}
                    @elseif(Input::has('p'))
                        {{$posts->appends(array('p' => Input::get('p')))->links() }}
                    @else
                        {{ $posts->links() }}
                    @endif
            </div>
        </div>
    </div>

    <hr>
@stop









