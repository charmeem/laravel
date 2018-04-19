@extends('layouts.app')

@section('content')
    <h2> Following are list of the current Posts</h2>

    <ul>

        @foreach($posts as $post)

            <li><a href="{{route('posts.show', $post->id)}}">{{ $post->title }}</a></li>

        @endforeach

    </ul>

@endsection
