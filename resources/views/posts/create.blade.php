@extends('layouts.app')

@section('content')
    <h2>Create a post</h2>

    {{--<form method="post" action="/posts" >--}}

    {!! Form::open(['method'=>'POST', 'action' =>'PostController@store']) !!}

        @csrf

        <input type="text" name="title" placeholder="Enter title">

        <input type="submit" name="Press">

    </form>


@endsection