@extends ('layouts.admin')

@section('content')

<h1>Create Users</h1>

{{--more Secure against sql injection--}}
{{--files=>true for including enctype file upload feature in form--}}
{!! Form::open(['method'=>'POST', 'action'=>'AdminUsersController@store', 'files'=>true]) !!}
{{--<form method="post" action="/posts/{{ $post->id }}" >--}}

 <!--csrf token-->
 @csrf

{{--<!--Way to send PUT method to edit method of controller-->--}}
{{--<input type="hidden" name="_method" value="PUT">--}}
<div class="form-group">
{!! Form::label('name', 'Name:') !!}
{!! Form::text('name', null, ['class'=>'form-control']) !!}
{{--<input type="text" name="title" placeholder="Enter title" value="{{ $post->title }}">--}}
</div>

<div class="form-group">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class'=>'form-control']) !!}
    {{--<input type="text" name="title" placeholder="Enter title" value="{{ $post->title }}">--}}
</div>

<div class="form-group">
    {!! Form::label('is_active', 'Status:') !!}
    {!! Form::select('is_active', array(1=>'Active', 0=>'Not Active'),0, ['class'=>'form-control']) !!}
    {{--<input type="text" name="title" placeholder="Enter title" value="{{ $post->title }}">--}}
</div>

<div class="form-group">
    {!! Form::label('role_id', 'Role:') !!}
    {!! Form::select('role_id', [''=>'Select Options'] + $roles,null, ['class'=>'form-control']) !!}
    {{--<input type="text" name="title" placeholder="Enter title" value="{{ $post->title }}">--}}
</div>

<div class="form-group">
    {!! Form::label('file', 'Title:') !!}
    {!! Form::file('file', ['class'=>'form-control']) !!}
    {{--<input type="text" name="title" placeholder="Enter title" value="{{ $post->title }}">--}}
</div>

<div class="form-group">
    {!! Form::label('password', 'Password:') !!}
    {!! Form::password('password', ['class'=>'form-control']) !!}
    {{--<input type="text" name="title" placeholder="Enter title" value="{{ $post->title }}">--}}
</div>

<div class="form-group">
{!! Form::submit('Create Post', ['class'=>'btn btn-primary']) !!}
{{--<input type="submit" name="update" value="Update">--}}
</div>

<!-- Errors Handling in seperate file in view/includes -->
@include('includes.form-error')

{!! Form::close() !!}
{{--</form>--}}

@stop