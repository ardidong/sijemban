<?php

namespace JEMBATAN\Http\Controllers;

use JEMBATAN\Bencana;
use Illuminate\Http\Request;

class BencanaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->user()->authorizeRoles('admin');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->user()->authorizeRoles('admin');
        return view('bencana.create');
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
            'batas_waktu'=>'required',
            'nama_bencana'=>'required',
            'deskripsi'=>'required',
            'cover'=>'image|nullable|max:1999'
        ]);
        //
        if($request->hasFile('cover')){
            $fileNameWithExt = $request->file('cover')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME); 
            $extension = $request->file('cover')->getClientOriginalExtension();
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            $path = $request->file('cover')->storeAs('public/cover',$fileNameToStore);
        }else{
            $fileNameToStore = 'noimage.jpg';
        }


        $bencana = new bencana([
            'batas_waktu'=>$request->post('batas_waktu'),
            'nama_bencana'=>$request->post('nama_bencana'),
            'deskripsi'=>$request->post('deskripsi'),
            'status'=>'Diunggah',
            'cover'=>$fileNameToStore
        ]);
        $bencana->save();
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
