@extends('layouts.app')

@section('content')
    <h2>Create a post</h2>

    {{--<form method="post" action="/posts" >--}}

    {!! Form::open(['method'=>'POST', 'action' =>'PostController@store']) !!}

        @csrf

    <div class="form-group">

        {!! Form::label('title', 'Title:') !!}
        {!! Form::text('title', null, ['class'=>'form-control']) !!}

    </div>

        {!! Form::submit('Enter here', ['class'=>'btn btn-primary']) !!}

    {!! Form::close() !!}


    {{--Handling errors generated from validation method used in PostController@store--}}
    @if(count($errors) > 0)

        <div class="alert alert-danger">

            <ul>

                @foreach($errors->all() as $error)

                    <li>{{$error}}</li>

                @endforeach

            </ul>

        </div>

    @endif


@endsection