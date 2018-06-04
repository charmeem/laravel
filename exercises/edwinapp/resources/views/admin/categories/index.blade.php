@extends ('layouts.admin');

    @section ('content');

        <h1>Categories</h1>


        <div class="col-sm-6">
             {{--more Secure against sql injection--}}
             {!! Form::open(['method'=>'POST', 'action'=>'AdminCategoriesController@store', 'files'=>true]) !!}
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
             {!! Form::submit('Create Category', ['class'=>'btn btn-info']) !!}
             {{--<input type="submit" name="update" value="Update">--}}
           </div>

             {!! Form::close() !!}
             {{--</form>--}}



        </div>



        <div class="col-sm-6">
            <table class="table table-hover">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Created on</th>
                  </tr>
                </thead>
                <tbody>

                @if($categories)

                  @foreach($categories as $category)

                  <tr>
                    <td>{{$category->id}}</td>

                    {{--Linnk that route to the controller@edit--}}
                    <td><a href="{{route('categories.edit', $category->id)}}">{{$category->name}}</a></td>

                    <td>{{$category->ceated_at ? $category->ceated_at->diffforHumans():'undefined'}}</td>
                  </tr>

                  @endforeach

              @endif

                </tbody>
            </table>
        </div>
    @stop