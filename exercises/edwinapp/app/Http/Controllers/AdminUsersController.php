<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersRequest;
use App\Http\Requests\UsersEditRequest;
use App\Photo;
use App\Role;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;

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
     *
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

        if(trim($request->password)== ''){
            //copying Form data except password
            $input = $request->except('password');
    } else {
        //Copying Form data to input variable array
        $input = $request->all();
    }

        // if file is attached in the form
        if($file=$request->file('photo_id')) {

            //append image file name with timestamp
            $name = time() . $file->getClientOriginalName();

            //move file to public/images directory and create if not exists
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

        //Display message once user is created also see index view file
        Session::flash('created_user', $input['name'] . ' has been created succesfully');

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
        $user=User::findOrFail($id);
        $roles=Role::pluck('name', 'id')->all();
        return view('admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     *
     * Using separate Request file to skip Password validation in Edit section
     *
     */
    public function update(UsersEditRequest $request, $id)
    {
        // To update a record in a table we need its id, whereas create doesnot needs any
        $user = User::findOrFail($id);

        if(trim($request->password)== ''){
            //copying Form data except password
            $input = $request->except('password');
        } else {
            //Copying Form data to input variable
            $input = $request->all();
        }

        // create and save photo record if attached
        if($file = $request->file('photo_id')) {
            $name=time() . $file->getClientOriginalName();
            $file->move('images', $name);
            $photo=Photo::create(['file'=>$name]);
            $input['photo_id'] = $photo->id;
        }

        // Encrypt password
        $input['password'] = bcrypt($request->password);

        $user->update($input);

        //Display message once user is updated also see index view file
        Session::flash('edited_user', $input['name'] . ' has been updated succesfully');

        return redirect('admin/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=User::findOrFail($id);

        // Make photo deleted from images directory
        if ($user->photo) {
            unlink(public_path() . $user->photo->file);
        }

        //delete the user from users table
        $user->delete();

        // also delete users photo from photo table
        $user->photo ? $user->photo->delete():'tuntun';


        //Add message once user is deleted also see index view file
        Session::flash('deleted_user', $user->name . ' has been deleted');

        return redirect('admin/users');
    }
}
