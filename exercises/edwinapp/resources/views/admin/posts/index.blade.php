@extends('layouts.admin')

@section('content')
    <h1> All Posts  </h1>
    <table class="table table-hover">
        <thead>
          <tr>
            <th>Id</th>
            <th>Photo</th>
            <th>Owner</th>
            <th>Category</th>
            <th>Title</th>
            <th>Content</th>
            <th>Created at</th>
            <th>Updated at</th>
          </tr>
        </thead>
        <tbody>

        @if($posts)
            @foreach($posts as $post)
        <tr>
            <td>{{$post->id}}</td>
            <td><img height=40 width=40 src="{{$post->photo? $post->photo->file:"http://placehold.it/40x40"}}" alt=""></td>
            <td><a href="{{route('posts.edit', $post->id)}}">{{$post->user->name}}</a></td>
            <td>{{$post->category ? $post->category->name : 'Uncategorised'}}</td>
            <td>{{$post->title}}</td>
            <td>{{$post->body}}</td>
            <td>{{$post->created_at->diffForhumans()}}</td>
            <td>{{$post->updated_at->diffForhumans()}}</td>

        </tr>
            @endforeach
        @endif

        </tbody>
    </table>
@stop