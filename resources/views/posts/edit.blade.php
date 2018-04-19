@extends('layouts.app')

@section('content')

    <h2>Edit post</h2>

    <form method="post" action="/posts/{{ $post->id }}" >

        <!--csrf token-->
        @csrf

        <!--Way to send PUT method to edit method of controller-->
        <input type="hidden" name="_method" value="PUT">

        <input type="text" name="title" placeholder="Enter title" value="{{ $post->title }}">

        <input type="submit" name="Press">

    </form>

    <!-- Form for Delete operation -->
    <form method="post" action="/posts/{{ $post->id }}">

        <!--csrf token-->
        @csrf

        <!--Way to send DELETE method to edit method of controller-->
        <input type="hidden" name="_method" value="DELETE">

        <input type="submit"  value="DELETE">

    </form>

@endsection