<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Sessions learning
     *
     * Creating, reading, deleting and updating
     */
    public function index(Request $request)
    {
//       // Creating session
//
//            // method-1
//            $request->session()->put(['mufti'=>'Master Engineer']);
//
//            //method-2
//            session(['mona'=>'Mufti Wife']);
//
//            return view('home');


        //Reading Sessions

            //method-1
//            return $request->session()->all();

            //method-2
//           return $request->session()->get('mufti');

            //method-3
//            return session('mona');

        //Deleting Session

           //method-1
//           $request->session()->forget('mona');

           //method-2  delete all
//           $request->session()->flush();
//
//        return $request->session()->all();
    }
}
