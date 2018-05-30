@extends ('layouts.admin')

@section('content')

    <h1>Create Posts</h1>

    {{--more Secure against sql injection--}}
    {{--files=>true for including enctype file to enable upload feature in form--}}
    {!! Form::open(['method'=>'POST', 'action'=>'AdminPostsController@store', 'files'=>true]) !!}
    {{--<form method="post" action="/posts/{{ $post->id }}" >--}}

    <!--csrf token-->
    @csrf

    {{--<!--Way to send PUT method to edit method of controller-->--}}
    {{--<input type="hidden" name="_method" value="PUT">--}}
    <div class="row">

    <div class="form-group">
        {!! Form::label('title', 'Title:') !!}
        {!! Form::text('title', null, ['class'=>'form-control']) !!}
        {{--<input type="text" name="title" placeholder="Enter title" value="{{ $post->title }}">--}}
    </div>

    <div class="form-group">
        {!! Form::label('photo_id', 'Photo:') !!}
        {!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
        {{--<input type="text" name="title" placeholder="Enter title" value="{{ $post->title }}">--}}
    </div>

    <div class="form-group">
        {!! Form::label('category_id', 'Category:') !!}
        {!! Form::select('category_id', array(1=>'Laravel', 2=>'React-Native'),null, ['class'=>'form-control']) !!}
        {{--<input type="text" name="title" placeholder="Enter title" value="{{ $post->title }}">--}}
    </div>

    <div class="form-group">
        {!! Form::label('body', 'Description:') !!}
        {!! Form::textarea('body',null, ['class'=>'form-control', 'rows'=>3]) !!}
        {{--<input type="text" name="title" placeholder="Enter title" value="{{ $post->title }}">--}}
    </div>


    <div class="form-group">
        {!! Form::submit('Create Post', ['class'=>'btn btn-primary']) !!}
        {{--<input type="submit" name="update" value="Update">--}}
    </div>
        {!! Form::close() !!}
        {{--</form>--}}
    </div>

    <!-- Errors Handling in seperate file in view/includes -->
    <div class="row">
        @include('includes.form-error')
    </div>


@endsection