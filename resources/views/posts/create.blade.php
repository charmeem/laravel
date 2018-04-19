@extends('layouts.app')

@section('content')
    <h2>Create a post</h2>

    <form method="post" action="/posts" >

        @csrf

        <input type="text" name="title" placeholder="Enter title">

        <input type="submit" name="Press">

    </form>


@endsection