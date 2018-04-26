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

//       $posts = Post::all();
//       //returning to view/posts directory, file index.blade.php
//        return view('posts.index', compact('posts'));

        /**
         * examples of Query scope manipulation
         * We will make following query simple by adding alias type in Post.php file
         */
        //$posts = Post::orderBy('id', 'des')->get();   // long command line
        $posts = Post::latest();   // short command line using Query scope
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

//   Advanced validation is used here by creating new request class
//   - php artisan make:request CreatePostRequest

    public function store ( CreatePostRequest $request)

     {
         /* Storing  files in Database
          *
          * create view file that incorporate files field in Form
          */

          $input = $request->all();             // copying input object
          if($file=$request->file('file')){  // if file is included in the object
              $name = $file->getClientOriginalName();
              $file->move('image', $name);  // moving file to image directory in public directory
              $input['path'] = $name;               // Assigning file name in path column
          }
          Post::create($input);    // Add or create data in the database



//         /* Testing files functionality */
//
//         $file = $request->file('file');
//
//         echo '<br>';
//         echo $file->getClientOriginalName();
//
//        echo '<br>';
//        echo $file->getClientSize();



//        //  Old validation style
//         // Validating before storing
//        $this->validate($request, [
//             'title'=>'required',     //These are validating rules
//             //'content'=>'required'
//        ]);


//        //Creating and storing post in the database
//        Post::create($request->all());
//
//        return redirect('/posts');  // redirecting to index method, as per route:list
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
