@extends('layouts.master1')

@section('content')
	@foreach ($posts as $post)
		Title: {{$post->title}} <br>
		Body: {{$post->body}} <br>
		Created: {{$post->created_at}}<br>
		Updated: {{$post->updated_at}}<br><br>
	@endforeach

@stop