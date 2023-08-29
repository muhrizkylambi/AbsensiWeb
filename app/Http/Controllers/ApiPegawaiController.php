<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class ApiPegawaiController extends Controller
{
    public function index()
    {
        $pegawai = Pegawai::all();
        return response()->json(['message' => 'Success','data' => $pegawai]);
    }
    
    public function show($id)
    {
        $pegawai = Pegawai::find($id);
        return response()->json(['message' => 'Success Show','data' =>$pegawai]);
    }
    
    public function store(Request $request)
    {
        $imageName = null;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $extension = $image->getClientOriginalExtension();
            $imageName = time() . '.' . $extension;
            $image->move(public_path('images/pegawai/'), $imageName);
        }

        $pegawai = Pegawai::create([
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

        return response()->json(['message' => 'Berhasil Ditambahkan!', 'data' => $pegawai]);
    }

    
    public function update(Request $request, $id)
    {
        $pegawai = Pegawai::findOrFail($id);

        $imageName = $pegawai->image;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $extension = $image->getClientOriginalExtension();
            $imageName = time() . '.' . $extension;
            $image->move(public_path('images/pegawai/'), $imageName);

            if ($pegawai->image && file_exists(public_path('images/pegawai/') . $pegawai->image)) {
                unlink(public_path('images/pegawai/') . $pegawai->image);
            }
        }

        $pegawai->update([
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

        return response()->json(['message' => 'Berhasil Diperbarui!', 'data' => $pegawai]);
    }


    public function destroy(Request $request, $id)
    {
        $pegawai = Pegawai::find($id);
        $pegawai->delete();
        return response()->json(['message' => 'Berhasil DiHapus!','data' => $pegawai]);
    }
}
