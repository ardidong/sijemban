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

      // sementara untuk menghitung rata" tanggal
      $tanggal = Donasi::whereNotNull('tanggal_jemput')->get();

      //hitung
      $dijemput = Donasi::orderBy('tanggal_jemput','desc')->get();
      $diajukan = Donasi::orderBy('created_at','desc')->get();
      $hitung_dijemput = array();
      for ($i=0; $i < 12 ; $i++) {
        $hitung_dijemput[$i] = Donasi::where('status','=','dijemput')->whereMonth('tanggal_jemput', '=', date($i+1))->count();
      }
      $hitung_diajukan = array();
      for ($i=0; $i < 12 ; $i++) {
        $hitung_diajukan[$i] = Donasi::where('status', '=', 'diajukan')->whereMonth('created_at', '=', date($i+1))->count();
      }

      return view('admin',compact('tanggal'))->with(['hitung_dijemput'=>$hitung_dijemput, 'hitung_diajukan'=>$hitung_diajukan]);
  }

  public function hitung(){
    $dijemput = Donasi::orderBy('tanggal_jemput','desc')->get();
    $diajukan = Donasi::orderBy('created_at','desc')->get();

    $hitung = array();
    for ($i=0; $i < 12 ; $i++) {
      $hitung[$i] = Donasi::whereMonth('created_at', '=', date($i))->count();
    }

  }
}
