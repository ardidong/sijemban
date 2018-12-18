<?php

namespace JEMBATAN\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use JEMBATAN\User;
use JEMBATAN\Role;
use Illuminate\Http\Request;

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->user()->authorizeRoles('admin');
        $petugas = User::all();
        return view('petugas.index',compact('petugas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->user()->authorizeRoles('admin');
        return view('petugas.create');
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
            'name'=>'required',
            'email'=>'required',
            'alamat'=>'required',
            'no_telepon'=>'required',
            'password'=>'required'
        ]);
        $petugas = new user([
            'name'=>$request->post('name'),
            'email'=>$request->post('email'),
            'alamat'=>$request->post('alamat'),
            'no_telepon'=>$request->post('no_telepon'),
            'password'=>Hash::make($request->post('password'))
        ]);
        $petugas->save();
        $petugas
             ->roles()
             ->attach(Role::where('name', 'petugas')->first());
        return redirect('/petugas')->with('succes','berhasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
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
        $petugas = User::find($id);
        $petugas->delete();

        return redirect('/petugas')->with('success', 'Petugas berhasil dihapus');
    }
}
