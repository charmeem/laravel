@extends('layouts.app')

@section('content')

    <h1> This is Contact Page made using blade template</h1>
    @if(count($family))
        @foreach($family as $person)
            <ul>
                <li>{{$person}}</li>
            </ul>
        @endforeach
    @endif

@stop