<?php

namespace JEMBATAN\Http\Controllers;

use JEMBATAN\Bencana;
use JEMBATAN\Donasi;
use JEMBATAN\User;
use JEMBATAN\Barang;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;

class AdminController extends Controller
{
  public function index(Request $request)
  {
      $bencanas = Bencana::all();
      $total_donasi1 = Donasi::where('status', '=', 'diajukan')->count();
      $total_donasi2 = Donasi::where('status', '=', 'dijemput')->count();
      // $days = 200;
      $tanggal = Donasi::whereNotNull('tanggal_jemput')->get();

      // $to = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', '2015-5-5 3:30:34');
      // $from = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', '2015-5-6 9:30:34');
      // $diff_in_days = $to->diffInDays($from);

      return view('admin',compact('tanggal'))->with(['total'=>$total_donasi1])->with(['total1'=>$total_donasi2]);
  }
}
