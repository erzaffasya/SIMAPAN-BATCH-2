<?php

namespace App\Http\Controllers;

use App\Models\JenisKekerasan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class JenisKekerasanController extends Controller
{
    public function index()
    {
        $JenisKekerasan = JenisKekerasan::all();
        return view('admin.jeniskekerasan.index', compact('JenisKekerasan'));
    }

    public function create()
    {
        return view('admin.jeniskekerasan.tambah');
    }

    public function store(Request $request)
    {
        $request->validate([
            // 'ft' => 'required'
        ]);

        JenisKekerasan::create([
            'jenis_kekerasan' => $request->jenis_kekerasan
        ]);


        return redirect()->route('jenis-kekerasan.index')
            ->with('success', 'JenisKekerasan Berhasil Ditambahkan');
    }

    public function show($id)
    {
        // $JenisKekerasan =  JenisKekerasan::find($id);
        // return view('admin.jeniskekerasan.Detailjeniskekerasan.index', compact('JenisKekerasan', 'DetailJenisKekerasan'));
    }


    public function edit($id)
    {
        $JenisKekerasan = JenisKekerasan::find($id);
        return view('admin.jeniskekerasan.ubah', compact('JenisKekerasan'));
    }

    public function update(Request $request, $id)
    {
        $JenisKekerasan = JenisKekerasan::findOrFail($id);
        $JenisKekerasan->jenis_kekerasan = $request->jenis_kekerasan;

        $JenisKekerasan->save();
        return redirect()->route('jenis-kekerasan.index')
            ->with('success', 'JenisKekerasan Berhasil Diubah');
    }

    public function destroy($id)
    {
        $JenisKekerasan = JenisKekerasan::findOrFail($id);
        $JenisKekerasan->delete();
        return redirect()->route('jenis-kekerasan.index')
            ->with('success', 'JenisKekerasan Berhasil Dihapus');
    }
}
