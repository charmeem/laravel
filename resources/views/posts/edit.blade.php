@extends('layouts.app')

@section('content')

    <h2>Edit post</h2>

    {{--more Secure against sql injection--}}
    {!! Form::model($post, ['method'=>'PATCH', 'action'=>['PostController@update', $post->id]]) !!}

    {{--<form method="post" action="/posts/{{ $post->id }}" >--}}

        <!--csrf token-->
        {{--@csrf--}}

        {{--<!--Way to send PUT method to edit method of controller-->--}}
        {{--<input type="hidden" name="_method" value="PUT">--}}

        {!! Form::label('title', 'Title:') !!}
        {!! Form::text('title', null, ['class'=>'form-control']) !!}
        {{--<input type="text" name="title" placeholder="Enter title" value="{{ $post->title }}">--}}

        {!! Form::submit('Update Post', ['class'=>'btn btn-info']) !!}
        {{--<input type="submit" name="update" value="Update">--}}

     {!! Form::close() !!}
     {{--</form>--}}


    <!-- Form for Delete operation -->
    {!! Form::open(['method'=>'DELETE', 'action'=>['PostController@destroy', $post->id]]) !!}
    {{--<form method="post" action="/posts/{{ $post->id }}">--}}

        <!--csrf token-->
        @csrf

        {{--<!--Way to send DELETE method to edit method of controller-->--}}
        {{--<input type="hidden" name="_method" value="DELETE">--}}

        {!! Form::submit('DELETE', ['class'=>'btn btn-danger']) !!}
        {{--<input type="submit"  value="DELETE">--}}

    {!! Form::close() !!}
    {{--</form>--}}

@endsection