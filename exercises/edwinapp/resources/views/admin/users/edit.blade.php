@extends ('layouts.admin')

@section('content')

    <h1>Edit Users</h1>

    {{--This class is added to solve error colors--}}
    <div class = "row">

        {{--more Secure against sql injection--}}
        {{--files=>true for including enctype file to enable upload feature in form--}}
        {!! Form::model($user, ['method'=>'PATCH', 'action'=>['AdminUsersController@update',$user->id], 'files'=>true]) !!}
        {{--<form method="post" action="/posts/{{ $post->id }}" >--}}

        <!--csrf token-->
        @csrf

        {{--<!--Way to send PUT method to edit method of controller-->--}}
        {{--<input type="hidden" name="_method" value="PUT">--}}
        <div class="col-sm-3">
            <img height="120" src="{{$user->photo ? $user->photo->file : "http://placehold.it/400x400"}}" alt="" class="img-responsiive img-rounded" >

        </div>

        <div class="col-sm-9">

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
                {!! Form::select('is_active', array(1=>'Active', 0=>'Not Active'),null, ['class'=>'form-control']) !!}
                {{--<input type="text" name="title" placeholder="Enter title" value="{{ $post->title }}">--}}
            </div>

            <div class="form-group">
                {!! Form::label('role_id', 'Role:') !!}
                {!! Form::select('role_id', $roles,null, ['class'=>'form-control']) !!}
                {{--<input type="text" name="title" placeholder="Enter title" value="{{ $post->title }}">--}}
            </div>

            <div class="form-group">
                {!! Form::label('photo_id', 'Photo:') !!}
                {!! Form::file('photo_id', ['class'=>'form-control']) !!}
                {{--<input type="text" name="title" placeholder="Enter title" value="{{ $post->title }}">--}}
            </div>

            <div class="form-group">
                {!! Form::label('password', 'Password:') !!}
                {!! Form::password('password', ['class'=>'form-control']) !!}
                {{--<input type="text" name="title" placeholder="Enter title" value="{{ $post->title }}">--}}
            </div>

            <div class="form-group">
                {!! Form::submit('Update User', ['class'=>'btn btn-primary col-sm-6']) !!}
                {{--<input type="submit" name="update" value="Update">--}}
            </div>
            {!! Form::close() !!}


            {{--Adding delete form--}}

            {!! Form::model($user, ['method'=>'DELETE', 'action'=>['AdminUsersController@destroy',$user->id]]) !!}

            <div class="form-group">
                {!! Form::submit('Delete User', ['class'=>'btn btn-danger col-sm-6']) !!}
                {{--<input type="submit" name="update" value="Update">--}}
            </div>

            {!! Form::close() !!}

        </div>

    </div>

    <div class="row">
        <!-- Errors Handling in seperate file in view/includes -->
        @include('includes.form-error')
    </div>


@stop