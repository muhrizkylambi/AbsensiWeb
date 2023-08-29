<?php

namespace App\Http\Controllers;

use App\Models\Bidang;
use App\Models\Jabatan;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $currentRoute = \Request::route()->getName();

        return view('pegawai.index', [
            'title' => 'Data Pegawai',
            'breadcrumb' => 'Data Pegawai',
            'pegawai' => Pegawai::all(),
            'currentRoute' => $currentRoute
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $currentRoute = \Request::route()->getName();

        return view('pegawai.create', [
            'title' => 'Tambah Data Pegawai',
            'bidang' => Bidang::all(),
            'jabatan' => Jabatan::all(),
            'breadcrumb' => 'Tambah Data Pegawai',
            'currentRoute' => $currentRoute
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->hasFile('image')) {
            $images = $request->file('image');
            $extention = $images->getClientOriginalExtension();
            $imageName = time() . '.' . $extention;
            $images->move(public_path('images/pegawai/'), $imageName);
        }

        Pegawai::create([
            'bidang_id' => $request->bidang_id,
            'jabatan_id' => $request->jabatan_id,
            'nip' => $request->nip,
            'nama_lengkap' => $request->nama_lengkap,
            'no_tlp' => $request->no_tlp,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'alamat' => $request->alamat,
            'image' => $imageName
        ]);

        return redirect()->route('pegawai.index')->with('status', 'Data Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pegawai $pegawai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pegawai $pegawai)
    {
        $currentRoute = \Request::route()->getName();

        return view('pegawai.edit', [
            'title' => 'Edit Data Pegawai',
            'breadcrumb' => 'Edit Data Pegawai',
            'bidangs' => Bidang::all(),
            'jabatans' => Jabatan::all(),
            'pegawai' => Pegawai::find($pegawai->id),
            'currentRoute' => $currentRoute
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pegawai $pegawai)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pegawai $pegawai)
    {
        Pegawai::where('id', $pegawai->id)->delete();
        return redirect()->route('pegawai.index')->with('status', 'Data Berhasil Dihapus!');
    }
}
