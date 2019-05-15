<?php

namespace JEMBATAN\Http\Controllers;

use JEMBATAN\Bencana;
use JEMBATAN\Barang;
use JEMBATAN\User;
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

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $bencanas = Bencana::all();
        $total_bencana = Bencana::all()->where('status', '=', 'Ditampilkan')->count();
        $total_barang = Barang::count();
        $total_akun = User::count();
        return view('welcome',compact('bencanas'))->with(['total'=>$total_bencana])->with(['total2'=>$total_barang])->with(['total3'=>$total_akun]);
    }
}
