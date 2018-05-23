@extends ('layouts.admin')

@section('content')
    {{--Adding deleted user message, also see AdminUsersController@destroy--}}
    @if(Session::has('deleted_user'))
        <p class="bg-danger">{{session('deleted_user')}} </p>
    @endif

    @if(Session::has('created_user'))
        <p class="bg-danger">{{session('created_user')}}</p>
    @endif

    @if(Session::has('edited_user'))
        <p class="bg-danger">{{session('edited_user')}} </p>
    @endif

    <h1>Users</h1>
    <table class="table table-hover">
        <thead>
          <tr>
            <th>Id</th>
            <th>Photo</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Status</th>
            <th>Created at</th>
            <th>Updated at</th>
          </tr>
        </thead>
        <tbody>

        <!--$users var comes from AdminUsersController@index -->
        @if($users)
          @foreach($users as $user)
            <tr>
            <td>{{$user->id}}</td>

            <!--photo below is User Model function that connect USer table to Photo table-->
            <!-- Checking if user has photo attached to avoid error -->
            <!--USing Accessor in Photo model to append images directory -->
            <!--<td><img height="50" width="50" src="/images/{{$user->photo ? $user->photo->file: "User has no photo"}}" alt=""></td> -->
            <td><img height="50" width="50" src="{{$user->photo ? $user->photo->file: "http://placehold.it/400x400"}}" alt=""></td>
            <td><a href="{{route('users.edit', $user->id)}}" >{{$user->name}}</a></td>
            <td>{{$user->email}}</td>
            <td>{{$user->role ? $user->role->name:"undefined"}}</td>
            <td>{{$user->is_active==1?'Active':'Not Active'}}</td>
            <td>{{$user->created_at->diffForHumans()}}</td>
            <td>{{$user->updated_at->diffForHumans()}}</td>
          </tr>
          @endforeach
         @endif
        </tbody>
    </table>

@stop