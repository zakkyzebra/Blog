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
                                {{-- {{$posts->user->first_name}}'s Post --}}
                            @elseif(Input::has('search'))
                                Searching for: {{Input::get('search')}}
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
                                                                                                        {{var_dump($posts)}}
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
                @if(Input::has('user'))
                    {{$posts->appends(array('user' => $post->user->username))->links() }}
                @elseif(Input::has('search'))
                    {{$posts->appends(array('search' => Input::get('search')))->links() }}
                @else
                    {{ $posts->links() }}
                @endif
            </div>
        </div>
    </div>

    <hr>
@stop









