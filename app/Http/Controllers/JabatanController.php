<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $currentRoute = \Request::route()->getName();

        return view('jabatan.index', [
            'title' => 'Data Jabatan',
            'breadcrumb' => 'Data Jabatan',
            'jabatans'=> Jabatan::all(),
            'currentRoute' => $currentRoute
          ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $currentRoute = \Request::route()->getName();

        return view('jabatan.create',[
            'title' => 'Tambah Data Jabatan',
            'breadcrumb' => 'Tambah Data Jabatan',
            'currentRoute' => $currentRoute
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Jabatan::create([
            'nama_jabatan' => $request->nama_jabatan,
            'ket_jabatan' => $request->ket_jabatan
          ]);
      
          return redirect()->route('jabatan.index')->with('status', 'Data Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Jabatan $jabatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jabatan $jabatan)
    {
        $currentRoute = \Request::route()->getName();
        
        return view('jabatan.edit', [
            'title' => 'Edit Data Jabatan',
            'breadcrumb' => 'Edit Data Jabatan',
            'jabatan' => Jabatan::find($jabatan->id),
            'currentRoute' => $currentRoute
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Jabatan $jabatan)
    {
        Jabatan::where('id', $jabatan->id)->update([
            'nama_jabatan' => $request->nama_jabatan,
            'ket_jabatan' => $request->ket_jabatan
          ]);
  
          return redirect()->route('jabatan.index')->with('status', 'Data Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jabatan $jabatan)
    {
        Jabatan::where('id',$jabatan->id)->delete();
        return redirect()->route('jabatan.index')->with('status', 'Data Berhasil Dihapus!');
    }

    

}
