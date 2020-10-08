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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
   /*
    *
    */
    public function players() {

        $lists = array(['name'=>"Lachy",'simbolo'=>"X"],['name'=>"segundo",'simbolo'=>"0"]);
        return view('play')->with(compact('lists'));
    }
}
