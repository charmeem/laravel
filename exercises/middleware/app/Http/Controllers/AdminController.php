<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     * Teing IsAdmin middle ware to this controller
     * @return void
     */
    public function __construct()
    {
        $this->middleware('IsAdmin');
    }

    public function index() {
        return " You are seeing this page as You an an administrator";
    }
}
