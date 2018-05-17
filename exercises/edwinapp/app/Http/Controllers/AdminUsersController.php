<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersRequest;
use App\Photo;
use App\Role;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // return "Hello Guys welcom to our new Application";

       $users = User::all();
       return view('admin.users.index', compact('users'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       // fetching roles from Role model
       $roles = Role::pluck('name','id')->all();
       return view('admin.users.create', compact('roles'));
    }

    /**
     * Persistent data- Store a newly created resource in storage.
     *
     * Triggers when submit button pressed, see create view file
     *
     * UsersRequest is for Validation created in Http/Request directory
     */

    public function store(UsersRequest $request)
    {
        // inserting form data in the database
        //User::create($request->all());

        // Adding photo uploading feature

        //Testing- testing
        //$input = $request->all();
//        if($request->file('photo_id')) {
//            return 'Photo exists';
//        }

        //Copying Form data to input variable
        $input = $request->all();
        //var_dump($input);
        // if file is attached in the form
        if($file=$request->file('photo_id')) {
            //append image file name with timestamp
            $name = time() . $file->getClientOriginalName();
            //move file to images directory and create if not exists
            $file->move('images', $name);
            //Insert file name in Photo table
            $photo = Photo::create(['file'=>$name]);
            //Copying received id from Photo table to $input vaiable
            $input['photo_id'] = $photo->id;
        }
        //and - else
            // Encrypt password
            $input['password'] = bcrypt($request->password);
            // store User data in User Table
            User::create($input);

        return redirect('admin/users');





        //return $request->all();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.users.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.users.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
