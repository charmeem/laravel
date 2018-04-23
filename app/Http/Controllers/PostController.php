<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return " Hi I just made my First controller in Laravel and you are viewing index method ";

       $posts = Post::all();

       //returning to view/posts directory, file index.blade.php
        return view('posts.index', compact('posts'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }


    /**
     * Store a newly created resource in storage.
     * route = /posts
     * We reach here as result of redirecting from html form action attribute
     * It means $request object contains $_POST Global var methods for form INPUT feilds
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

//    Not using following original Request class
//    public function store(Request $request)

//   Advanced validation by creating new request class
//   - php artisan make:request CreatePostRequest

    public function store ( CreatePostRequest $request)

     {
//        //  Old validation style
//         // Validating before storing
//        $this->validate($request, [
//             'title'=>'required',     //These are validating rules
//             //'content'=>'required'
//        ]);


        //Creating and storing post in the database
        Post::create($request->all());

        return redirect('/posts');  // redirecting to index method, as per route:list
    }

    /**
     * Display the specified resource.
     * route = /posts/{id}
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         //return " This is Show method with an id of " . $id;

        $post = Post::findOrFail($id);

         return view('posts.show', compact('post'));

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

        return view('posts.edit', compact('post'));
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
        $post = Post::findOrFail($id);
        $post->update($request->all());
        return redirect('/posts');   // redirecting to index method

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::whereId($id)->delete();  // single line delete operation

        return redirect('/posts');        // redirect to index method
    }

//    /**
//     *  Contact page
//     */
//    public function contact() {
//        $family = ['Munazza', 'Mahreen', 'Imama', 'Imaan', 'Zainab'];
//        return view('contact', compact('family'));
//    }
//
//    /**
//     *  Post page
//     */
//    public function show_post($id, $name, $address) {
//        return view('post', compact('id', 'name', 'address'));
//    }
}
