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

    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
   

        $request->user()->authorizeRoles('petugas');
        $jemputs = DB::table('jemputs')
                            ->join('donasis','jemputs.kode_donasi','=','donasis.kode_donasi')  
                            ->join('users','users.id','=','donasis.id_donatur')
                            ->join('bencanas','donasis.id_bencana','=','bencanas.id')
                            ->select('jemputs.kode_donasi','jemputs.berat','jemputs.jarak','donasis.alamat','donasis.no_resi','donasis.status',
                                    'users.name','bencanas.nama_bencana')
                            ->orderBy('jemputs.prioritas')
                            ->get();
        $total = DB::table('jemputs')
                            ->select(DB::raw('SUM(berat) AS totBerat, SUM(jarak) AS totJarak'))
                            ->get();
        return view('jemput.index',compact('jemputs','total'));    
    }

  /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
            
        $donasis = Donasi::all()->where('status','=','Diajukan');
        foreach($donasis as $donasi)
        {
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
            $jemputan = new jemput([
                'jarak'=>$jarak,
                'berat'=>$berat,
                'prioritas'=>$test=$this->infer($jarak,$berat),
                'hari'=>Carbon::now()->toDateTimeString(),
                'id_petugas'=>4,
                'kode_donasi'=>$donasi->kode_donasi

            ]);
            $jemputan->save();
        }
        return redirect('/jemput');
    }

    
    public function infer($jarak,$berat)
    {
        $nJarak=array();

        /*
        * indeks 0 = sangat dekat
        * indeks 1 = dekat
        * indeks 2 = jauh
        * indeks 3 = sangat jauh
        */

        //hitung himpunan sangat dekat
        if($jarak<=1000){
            $nJarak[0] = 1;
        }else if($jarak>=1000 && $jarak<=4000){ //1000 sampai 4000
            $nJarak[0] = (4000-$jarak)/3000;
        }else{
            $nJarak[0] = 0;
        }

        //hitung himpunan dekat
        if($jarak<=1000||$jarak>=7000){
            $nJarak[1] = 0;
        }else if($jarak>=1000 && $jarak<=4000){ //1000 sampai 4000
            $nJarak[1] = ($jarak-1000)/3000;
        }else{
            $nJarak[1] = (7000-$jarak)/3000;       //4000 sampai 7000
        }

        //hitung himpunan jauh
        if($jarak<=4000||$jarak>=10000){
            $nJarak[2] = 0;
        }else if($jarak>=4000 && $jarak<=7000){ //4000 sampai 7000
            $nJarak[2] = ($jarak-4000)/3000;
        }else{
            $nJarak[2] = (10000-$jarak)/3000;       //7000 sampai 10000
        }

        //hitung himpunan sangat jauh
        if($jarak<=7000){
            $nJarak[3] = 0;
        }else if($jarak>=7000 && $jarak<=10000){ //1000 sampai 4000
            $nJarak[3] = ($jarak-7000)/3000;
        }else{
            $nJarak[3] = 1;
        }

        $nBerat=array();

         //hitung himpunan ringan
         if($berat>=15){
            $nBerat[0] = 0;
        }else if($berat>=10 && $berat<=15){ //10 sampai 15
            $nBerat[0] = (15-$berat)/5;
        }else{
            $nBerat[0] = 1;
        }

         //hitung himpunan sedang
         if($berat<=10||$berat>=20){
            $nBerat[1] = 0;
        }else if($berat>=10 && $berat<=15){ //10 sampai 15
            $nBerat[1] = ($berat-10)/5;
        }else{
            $nBerat[1] = (20-$berat)/5;
        }

         //hitung himpunan berat
        if($berat<=15){
            $nBerat[2] = 0;
        }else if($berat>=15 && $berat<=20){ //15 sampai 20
            $nBerat[2] = ($berat-15)/5;
        }else{
            $nBerat[2] = 1;
        }
        

        $rule=array();
        $x=0;
        $sumA=0;

        for($i=0;$i<4;$i++){
            for ($j=0; $j <3 ; $j++) { 
                $rule[$x]=min($nJarak[$i],$nBerat[$j]);
                $sumA+=$rule[$x];
                $x++;
            }
        }

        $sumAZ=0;
        for ($i=0; $i <12 ; $i++) { 
            if($i==4||$i==7){ //prioritas bertambah bila berat = sedang dan jarak = dekat/jauh
                $sumAZ+=(12-$rule[$i]*11)*$rule[$i];
            }else{
                $sumAZ+=(11*$rule[$i]+4)*$rule[$i];
            }
        }
        
        return $sumAZ/$sumA ;

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
