<?php

namespace App\Http\Controllers;

use App\Models\JenisLayanan;
use Illuminate\Http\Request;

class JenisLayananController extends Controller
{
    public function index()
    {
        $JenisLayanan = JenisLayanan::all();
        return view('admin.jenislayanan.index', compact('JenisLayanan'));
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

        JenisLayanan::create([
            'jenis_layanan' => $request->jenis_layanan
        ]);


        return redirect()->route('jenis-layanan.index')
            ->with('success', 'JenisLayanan Berhasil Ditambahkan');
    }

    public function show($id)
    {
        // $JenisLayanan =  JenisLayanan::find($id);
        // return view('admin.jenislayanan.Detailjenislayanan.index', compact('JenisLayanan', 'DetailJenisLayanan'));
    }


    public function edit($id)
    {
        $JenisLayanan = JenisLayanan::find($id);
        return view('admin.jenislayanan.ubah', compact('JenisLayanan'));
    }

    public function update(Request $request, $id)
    {
        $JenisLayanan = JenisLayanan::findOrFail($id);
        $JenisLayanan->jenis_layanan = $request->jenis_layanan;

        $JenisLayanan->save();
        return redirect()->route('jenis-layanan.index')
            ->with('success', 'JenisLayanan Berhasil Diubah');
    }

    public function destroy($id)
    {
        $JenisLayanan = JenisLayanan::findOrFail($id);
        $JenisLayanan->delete();
        return redirect()->route('jenis-layanan.index')
            ->with('success', 'JenisLayanan Berhasil Dihapus');
    }
}
