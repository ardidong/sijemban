<?php

namespace JEMBATAN\Http\Controllers;

use Illuminate\Support\Arr;
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
        $hitung_diajukan[$i] = Donasi::whereMonth('created_at', '=', $i+1)->count();
      }

      //hitung jumlah user perbulan
       $hitung_donatur = array();
       for ($i=0; $i < 12 ; $i++) {
         $hitung_donatur[$i] = DB::table('users')->join('role_user', function($join) {
                                                                      $join->on('users.id','=','role_user.user_id')->where('role_user.role_id','=',1);
                                                                    })->whereMonth('created_at','=',$i+1)->count();
       }
       $hitung_petugas = array();
       for ($i=0; $i < 12 ; $i++) {
         $hitung_petugas[$i] = DB::table('users')->join('role_user', function($join) {
                                                                      $join->on('users.id','=','role_user.user_id')->where('role_user.role_id','=',2);
                                                                    })->whereMonth('created_at','=',$i+1)->count();
       }
      return view('admin',compact('tanggal'))->with(['hitung_dijemput'=>$hitung_dijemput, 'hitung_diajukan'=>$hitung_diajukan, 'hitung_donatur'=>$hitung_donatur,'hitung_petugas'=>$hitung_petugas])
                                             ->with('lokasi',$this->hitungLokasi());

    }

  public function hitung(){
    $dijemput = Donasi::orderBy('tanggal_jemput','desc')->get();
    $diajukan = Donasi::orderBy('created_at','desc')->get();

    $hitung = array();
    for ($i=0; $i < 12 ; $i++) {
      $hitung[$i] = Donasi::whereMonth('created_at', '=', date($i))->count();
    }

  }

  public function hitungLokasi(){
      $hasil = array();
      $tes = DB::table('donasis')
                    ->select(DB::raw(' kecamatan , count(kecamatan) as jumlah'))
                    ->groupBy('kecamatan')
                    ->get();

      foreach($tes as $lokasi){
        $hasil[] = Arr::add(['name' => $lokasi->kecamatan],'value', $lokasi->jumlah );
      }

      // $hasil[0] = Arr::add(['name' => 'Berbah'], 'value', Donasi::where('kecamatan','like','%Berbah%')
      // ->count());
      // $hasil[1] = Arr::add(['name' => 'Cangkringan'], 'value', Donasi::where('kecamatan','like','%Cangkringan%')
      // ->count());
      // $hasil[2] = Arr::add(['name' => 'Depok'], 'value', Donasi::where('kecamatan','like','%Depok%')
      // ->count());
      // $hasil[3] = Arr::add(['name' => 'Gamping'], 'value', Donasi::where('kecamatan','like','%Gamping%')
      // ->count());
      // $hasil[4] = Arr::add(['name' => 'Godean'], 'value', Donasi::where('kecamatan','like','%Godean%')
      // ->count());
      // $hasil[5] = Arr::add(['name' => 'Kalasan'], 'value', Donasi::where('kecamatan','like','%Kalasan%')
      // ->count());
      // $hasil[6] = Arr::add(['name' => 'Minggir'], 'value', Donasi::where('kecamatan','like','%Minggir%')
      // ->count());
      // $hasil[7] = Arr::add(['name' => 'Mlati'], 'value', Donasi::where('kecamatan','like','%mlati%')
      // ->count());
      // $hasil[8] = Arr::add(['name' => 'Moyudan'], 'value', Donasi::where('kecamatan','like','%Moyudan%')
      // ->count());
      // $hasil[9] = Arr::add(['name' => 'Ngaglik'], 'value', Donasi::where('kecamatan','like','%Ngaglik%')
      // ->count());
      // $hasil[10] = Arr::add(['name' => 'Ngemplak'], 'value', Donasi::where('kecamatan','like','%Ngemplak%')
      // ->count());
      // $hasil[11] = Arr::add(['name' => 'Pakem'], 'value', Donasi::where('kecamatan','like','%Pakem%')
      // ->count());
      // $hasil[12] = Arr::add(['name' => 'Prambanan'], 'value', Donasi::where('kecamatan','like','%Prambanan%')
      // ->count());
      // $hasil[13] = Arr::add(['name' => 'Seyegan'], 'value', Donasi::where('kecamatan','like','%Seyegan%')
      // ->count());
      // $hasil[14] = Arr::add(['name' => 'Sleman'], 'value', Donasi::where('kecamatan','like','%Sleman%')
      // ->count());
      // $hasil[15] = Arr::add(['name' => 'Tempel'], 'value', Donasi::where('kecamatan','like','%Tempel%')
      // ->count());
      // $hasil[16] = Arr::add(['name' => 'Turi'], 'value', Donasi::where('kecamatan','like','%Turi%')
      // ->count());

      return $hasil;
  }





}
