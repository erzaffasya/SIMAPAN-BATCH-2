<?php

namespace App\Http\Controllers;

use App\Models\JenisLayananPengaduan;
use Illuminate\Http\Request;

class JenisLayananPengaduanController extends Controller
{
    public function index()
    {
        $JenisLayananPengaduan = JenisLayananPengaduan::all();
        return view('admin.jenislayanan.index', compact('JenisLayananPengaduan'));
    }

    public function create()
    {
        return view('admin.jenislayanan.tambah');
    }

    public function store(Request $request)
    {
        $request->validate([
            // 'ft' => 'required'
        ]);

        JenisLayananPengaduan::create([
            'jenis_layanan_id' => $request->jenis_layanan_id,
            'penguan_id' => $request->penguan_id,
        ]);


        return redirect()->route('jenislayanan.index')
            ->with('success', 'JenisLayananPengaduan Berhasil Ditambahkan');
    }

    public function show($id)
    {
        // $JenisLayananPengaduan =  JenisLayananPengaduan::find($id);
        // return view('admin.jenislayanan.Detailjenislayanan.index', compact('JenisLayananPengaduan', 'DetailJenisLayananPengaduan'));
    }


    public function edit($id)
    {
        $JenisLayananPengaduan = JenisLayananPengaduan::find($id);
        return view('admin.jenislayanan.ubah', compact('JenisLayananPengaduan'));
    }

    public function update(Request $request, $id)
    {
        $JenisLayananPengaduan = JenisLayananPengaduan::findOrFail($id);
        $JenisLayananPengaduan->jenis_layanan_id = $request->jenis_layanan_id;
        $JenisLayananPengaduan->pengaduan_id = $request->pengaduan_id;

        $JenisLayananPengaduan->save();
        return redirect()->route('jenislayanan.index')
            ->with('success', 'JenisLayananPengaduan Berhasil Diubah');
    }

    public function destroy($id)
    {
        $JenisLayananPengaduan = JenisLayananPengaduan::findOrFail($id);
        $JenisLayananPengaduan->delete();
        return redirect()->route('jenislayanan.index')
            ->with('success', 'JenisLayananPengaduan Berhasil Dihapus');
    }
}
