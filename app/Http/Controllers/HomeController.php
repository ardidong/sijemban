<?php

namespace JEMBATAN\Http\Controllers;

use JEMBATAN\Bencana;
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
    public function index(Request $request)
    {
        $bencanas = Bencana::all();
        return view('welcome',compact('bencanas'));
    }
}
