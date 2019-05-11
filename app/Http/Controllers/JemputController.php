<?php

namespace JEMBATAN\Http\Controllers;

use Illuminate\Http\Request;
use JEMBATAN\Donasi;
use JEMBATAN\Barang ;
use JEMBATAN\User;
use Illuminate\Support\Str;
use Carbon\Carbon;

class JemputController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->user()->authorizeRoles('petugas');
        $donasis = Donasi::all()->sortByDesc('created_at');
        return view('jemput.index',compact('donasis'));
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
        return redirect()->intended(route(' jemput'));
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
