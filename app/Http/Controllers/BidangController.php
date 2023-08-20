<?php

namespace App\Http\Controllers;

use App\Models\Bidang;
use Illuminate\Http\Request;

class BidangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $currentRoute = \Request::route()->getName();

        return view('bidang.index', [
            'title' => 'Data Bidang',
            'breadcrumb' => 'Data Bidang',
            'bidangs' => Bidang::all(),
            'currentRoute' => $currentRoute
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $currentRoute = \Request::route()->getName();

        return view('bidang.create',[
            'title' => 'Tambah Data Bidang',
            'breadcrumb' => 'Tambah Data Bidang',
            'currentRoute' => $currentRoute
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Bidang::create([
            'nama_bidang' => $request->nama_bidang,
            'ket_bidang' => $request->ket_bidang
          ]);
      
          return redirect()->route('bidang.index')->with('status', 'Data Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Bidang $bidang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bidang $bidang)
    {
        $currentRoute = \Request::route()->getName();
        
        return view('bidang.edit', [
            'title' => 'Edit Data Bidang',
            'breadcrumb' => 'Edit Data Bidang',
            'bidang' => Bidang::find($bidang->id),
            'currentRoute' => $currentRoute
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bidang $bidang)
    {
        Bidang::where('id', $bidang->id)->update([
            'nama_bidang' => $request->nama_bidang,
            'ket_bidang' => $request->ket_bidang
          ]);
  
          return redirect()->route('bidang.index')->with('status', 'Data Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bidang $bidang)
    {
        Bidang::where('id',$bidang->id)->delete();
        return redirect()->route('bidang.index')->with('status', 'Data Berhasil Dihapus!');
    }
}
