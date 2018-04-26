@extends('layouts.app')

@section('content')
    <h2> Following are list of the current Posts</h2>

    <ul>

        @foreach($posts as $post)

            <li><a href="{{route('posts.show', $post->id)}}">{{ $post->title }}</a></li>

            {{--Reading Image path from database and displaying--}}
            <div class="image-container">
                {{--static image directory path--}}
                {{--<img height="100" width="200" src="/image/{{$post->path}}" alt="">--}}

                {{--image directory path is now included in Post model Accessor method--}}
                <img height="100" width="200" src="{{$post->path}}" alt="">
            </div>

            <br>

        @endforeach

    </ul>

@endsection
