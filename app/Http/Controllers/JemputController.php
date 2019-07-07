<?php

namespace JEMBATAN\Http\Controllers;

use Illuminate\Http\Request;
use JEMBATAN\Donasi;
use JEMBATAN\Barang ;
use JEMBATAN\User;
use JEMBATAN\Jemput;
use Illuminate\Support\Str;
use Carbon\Carbon;
use DB;
use GuzzleHttp;
use GuzzleHttp\Client;

class JemputController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    //     $lat = -7.721217;
    //     $lng = 110.347938;
    //     $latlng = $lat.','.$lng;
    //     $client = new Client(); //
    //    $request =$client->post(
    //        "https://maps.googleapis.com/maps/api/distancematrix/json?units=metric&origins=".$latlng."&destinations=-7.718300,110.357189&key=AIzaSyC6vGzt-YmKpCg-WwAL-FJ7VQ1N9QZzM3U");
    //     $response = $request->getBody()->getContents();
    //     $jarak = json_decode($response);
    //     var_dump($jarak ->rows[0]->elements[0]->distance->value);
            

        // $request->user()->authorizeRoles('petugas');
        // $jemputs = DB::table('jemput')
        //                     ->join('donasis','jemput.kode_donasi','=','donasis.kode_donasi')
        //                     ->join('bencanas','donasis.id_petugas','=','bencanas.id')
        //                     ->join('users','users.id','=','donasis.id_donatur')
        //                     ->select('jemput.prioritas','jemput.berat','jemput.jarak','users.name',
        //                              'bencanas.nama_bencana','donasis.alamat','donasis.no_resi','donasis.status');
       // return view('jemput.index',compact('jemputs'));
        //return view('jemput.index');


        //===============
        $donasis = Donasi::all()->where('status','=','Diajukan');
        foreach($donasis as $donasi){
            //Cari Jarak Dengan API GOOGLE Maps
            $latlng = $donasi->latitude.','.$donasi->longitude;
            $client = new Client(); //
            $request =$client->post(
                "https://maps.googleapis.com/maps/api/distancematrix/json?units=metric&origins=".$latlng."&destinations=-7.718300,110.357189&key=AIzaSyC6vGzt-YmKpCg-WwAL-FJ7VQ1N9QZzM3U");
            $response = $request->getBody()->getContents();
            $result = json_decode($response);
            $jarak = $result ->rows[0]->elements[0]->distance->value;
                 
            $query = DB::table('barangs')
                                ->select(DB::raw('sum(berat) as jumlah'))
                                ->where('kode_donasi','=',$donasi->kode_donasi)
                                ->get();
            $berat = $query[0]->jumlah;
            $today = Carbon::now()->toDateTimeString();
           
            $jemputan = new jemput([
                'jarak'=>$jarak,
                'berat'=>$berat,
                'prioritas'=>1,
                'hari'=>$today,
                'id_petugas'=>4,
                'kode_donasi'=>1

            ]);
            $jemputan->save();

        }
        
    }

    public function schedule()
    {
        

    }
    
    public function infer($berat,$jarak)
    {
        $sDekat;
        $dekat;
        $jauh;
        $sJauh;
        //hitung himpunan sangat dekat
        if($jarak<=1000){
            $sDekat = 1;
        }else if($jarak>=1000 && $jarak<=4000){ //1000 sampai 4000
            $sDekat = (4000-$jarak)/3000;
        }else{
            $sDekat = 0;
        }

        //hitung himpunan dekat
        if($jarak<=1000||$jarak>=7000){
            $dekat = 0;
        }else if($jarak>=1000 && $jarak<=4000){ //1000 sampai 4000
            $dekat = ($jarak-1000)/3000;
        }else{
            $dekat = (7000-$jarak)/3000;       //4000 sampai 7000
        }

        //hitung himpunan jauh
        if($jarak<=4000||$jarak>=10000){
            $jauh = 0;
        }else if($jarak>=4000 && $jarak<=7000){ //4000 sampai 7000
            $jauh = ($jarak-4000)/3000;
        }else{
            $jauh = (10000-$jarak)/3000;       //7000 sampai 10000
        }

        //hitung himpunan sangat jauh
        if($jarak<=7000){
            $sJauh = 0;
        }else if($jarak>=7000 && $jarak<=10000){ //1000 sampai 4000
            $sJauh = ($jarak-7000)/3000;
        }else{
            $sJauh = 1;
        }

        $ringan;
        $sedang;
        $berat;

         //hitung himpunan ringan
         if($berat>=15){
            $ringan = 0;
        }else if($berat>=10 && $berat<=15){ //10 sampai 15
            $ringan = (15-$berat)/5;
        }else{
            $ringan = 1;
        }

         //hitung himpunan sedang
         if($berat<=10||$berat>=20){
            $sedang = 0;
        }else if($berat>=10 && $berat<=15){ //10 sampai 15
            $sedang = ($berat-10)/5;
        }else{
            $sedang = (20-$berat)/5;
        }

         //hitung himpunan berat
         if($berat<=15){
            $berat = 0;
        }else if($berat>=15 && $berat<=20){ //15 sampai 20
            $berat = ($berat-15)/5;
        }else{
            $berat = 1;
        }

          

    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id,Request $request)
    {
        $request->user()->authorizeRoles('petugas');
     
        $donasis = Donasi::find($id);
        $barang = Barang::all()->where('kode_donasi',$id);
        $donatur = User::all()->where('id',$donasis->id_donatur);
        return view('jemput.show',compact('donasis','barang','donatur'));
    }

    public function verifikasi($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id,Request $request)
    {
        $verif = Donasi::find($id);
        $verif->status ='Dijemput';
        $verif->no_resi = Str::random();
        $verif->tanggal_jemput = Carbon::now()->toDateTimeString();
        $verif->save();
        return redirect()->intended(route('jemput.index'));
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
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
