<?php

namespace JEMBATAN\Http\Controllers;

use Illuminate\Http\Request;
use JEMBATAN\Donasi;
use JEMBATAN\Barang;
use JEMBATAN\Bencana;
use Illuminate\Support\Facades\Auth;

class DonasiController extends Controller
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
        $request->user()->authorizeRoles('donator');
        $ids = Auth::user()->id;
        $donasis = Donasi::all()->where('id_donatur',$ids)->sortByDesc('created_at');
        return view('donasi.index',compact('donasis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id,Request $request)
    {
        $request->user()->authorizeRoles('donator');
        $bencana = Bencana::find($id);
        return view('donasi.create',compact('bencana'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'alamat'=>'required',
            'latitude'=>'required',
            'longitude'=>'required',
            'kecamatan'=>'required',
            'kabupaten'=>'required',
            'provinsi'=>'required',
            'jenis'=>'required',
            'namabarang'=>'required',
            'jmlbarang'=>'required'
        ]);
        $donasi = new donasi([
            'status'=>'Diajukan',
            'alamat'=>$request->post('alamat'),
            'latitude'=>$request->post('latitude'),
            'longitude'=>$request->post('longitude'),
            'kecamatan'=>$request->post('kecamatan'),
            'kabupaten'=>$request->post('kabupaten'),
            'provinsi'=>$request->post('provinsi'),
            'id_donatur'=>Auth::user()->id,
            'id_bencana'=>$request->post('id_bencana'),
        ]);
        $donasi->save();
        $xjenis = $request->jenis;
        $xnama = $request->namabarang;
        $xjumlah = $request->jmlbarang;
        $xberat = $request->brtbarang;
        $count = count($xjenis);
        for($i=0;$i<$count;$i++)
        {
            $barang = new barang();
            $barang->jenis = $xjenis[$i];
            $barang->nama = $xnama[$i];
            $barang->jumlah = $xjumlah[$i];
            $barang->berat = $xberat[$i];
            $donasi->barang()->save($barang);

        }

        return redirect('/donasi')->with('succes','berhasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        $request->user()->authorizeRoles('donator');
        $donasis = Donasi::find($id);
        $barang = Barang::all()->where('kode_donasi',$id);
        return view('donasi.show',compact('donasis','barang'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $donasi = Donasi::find($id);
        $donasi->delete();

        return redirect('/shares')->with('success', 'Stock has been deleted Successfully');
    }

    public function tambahBarang(Request $request){
    }

}
