<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Donasi;
use App\Barang;
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
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('donasi.create');
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
            'kecamatan'=>'required',
            'kabupaten'=>'required',
            'provinsi'=>'required',
            'jenis'=>'required',
            'namabarang'=>'required',
            'jmlbarang'=>'required|integer'
        ]);
        $donasi = new donasi([
            'status'=>'Diajukan',
            'alamat'=>$request->post('alamat'),
            'kecamatan'=>$request->post('kecamatan'),
            'kabupaten'=>$request->post('kabupaten'),
            'provinsi'=>$request->post('provinsi'),
            'id_donatur'=>Auth::user()->id,
            'id_bencana'=>'1',
            'id_petugas'=>$request->post('id_petugas')
        ]);
        // $barang = new barang([
        //     'kode_donasi'=>$request->post('kode_donasi'),
        //     'jenis'=>$request->post('jenis'),
        //     'namabarang'=>$request->post('namabarang'),
        //     'jmlbarang'=>$request->post('jmlbarang')
        // ]);

        $donasi->save();
        //$barang->save();
        return redirect('/donasi')->with('succes','berhasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }
}
