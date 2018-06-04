@extends ('layouts.admin');

@section ('content');

<h1>Categories</h1>


<div class="col-sm-6">
{{--more Secure against sql injection--}}
{!! Form::model($category, ['method'=>'PATCH', 'action'=>['AdminCategoriesController@update', $category->id]]) !!}
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
        {!! Form::submit('Update Category', ['class'=>'btn btn-info col-sm-6']) !!}
        {{--<input type="submit" name="update" value="Update">--}}
    </div>

    {!! Form::close() !!}
    {{--</form>--}}

    {{--Delete Form and Button    --}}
    {!! Form::open(['method'=>'DELETE', 'action'=>['AdminCategoriesController@destroy', $category->id]]) !!}
    <div class="form-group">
        {!! Form::submit('Delete Category', ['class'=>'btn btn-danger col-sm-6']) !!}
        {{--<input type="submit" name="update" value="Update">--}}
    </div>

    {!! Form::close() !!}
</div>



<div class="col-sm-6">

</div>
@stop