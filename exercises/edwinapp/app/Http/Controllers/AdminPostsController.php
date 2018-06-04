<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\PostCreateRequest;
use App\Photo;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id')->all();

        return view('admin.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *
     * validation using PostCreateRequest
     *
     */
    public function store(PostCreateRequest $request)
    {

        //return $request->all();

        $input = $request->all();

        // Pulling the user that is logged in
        $user=Auth::user();

        //Check and upload picture to database
        if($file=$request->file('photo_id')) {

            $name = time(). $file->getClientOriginalName();

            $file->move('images', $name);

            // Create photo record in Photo table
            $photo = Photo::create(['file'=>$name]);
//var_dump($photo->id);
            $input['photo_id'] = $photo->id;
        }

        // Create Post for the logged in USer
        $user->posts()->create($input);

        return redirect('/admin/posts');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $categories= Category::pluck('name', 'id')->all();

        return view('admin.posts.edit', compact('post', 'categories'));
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
        $input=$request->all();

        if($file=$request->file('photo_id')) {

            $name =time() . $file->getClientOriginalName();

            $file->move('images', $name);

            $photo = Photo::create(['file'=>$name]);

            $input['photo_id'] = $photo->id;

        }

        // Updating code here is deiiferent then the User update section,
        // reason is here we have to link post to its user in order to update it

        Auth::user()->posts()->whereId($id)->first()->update($input);

        return redirect('/admin/posts');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $post = Post::findOrFail($id);

       // if posts has photo object associated with , remove it from public directory
       if($post->photo) {
           unlink(public_path() . $post->photo->file);
       }

       // Delete related photo of the post if any
        $post->photo ? $post->photo->delete(): 'no photo exists';


       // delete post record
        $post->delete();

        return redirect('admin/posts');
    }
}