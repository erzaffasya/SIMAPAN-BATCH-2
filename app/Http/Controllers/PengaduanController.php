<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;

class PengaduanController extends Controller
{
    public function index()
    {
        $Pengaduan = Pengaduan::all();
        return view('admin.pengaduan.index', compact('Pengaduan'));
    }

    public function create()
    {
        return view('admin.pengaduan.tambah');
    }

    public function store(Request $request)
    {
        $request->validate([
            // 'ft' => 'required'
        ]);

        if ($request->foto != null) {
            $extention = $request->foto->extension();
            $file_name = time() . '.' . $extention;
            $image = $request->file('foto');
            $image = Image::make($request->file('foto'));
            $image->resize(720, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $path = storage_path("app/public/img/pengaduan/");
            if (!File::exists($path)) {
                File::makeDirectory($path, $mode = 0777, true, true);
            }
            $image->save($path . $file_name, 80);
        } else {
            $file_name = null;
        }

        Pengaduan::create([
            'nomor' => $request->nomor,
            'tanggal_registrasi' => $request->tanggal_registrasi,
            'petugas_penerima' => $request->petugas_penerima,
            'petugas_menangani' => $request->petugas_menangani,
            'jenis_aduan' => $request->jenis_aduan,
            'nama_pelapor,' => $request->nama_pelapor,
            'jenis_kelamin_pelapor,' => $request->jenis_kelamin_pelapor,
            'alamat_pelapor,' => $request->alamat_pelapor,
            'hp_pelapor,' => $request->hp_pelapor,
            'hubungan_korban,' => $request->hubungan_korban,
            'nama_korban,' => $request->nama_korban,
            'nama_alias_korban,' => $request->nama_alias_korban,
            'nik_korban,' => $request->nik_korban,
            'jenis_kelamin_korban,' => $request->jenis_kelamin_korban,
            'lahir_korban,' => $request->lahir_korban,
            'usia_korban,' => $request->usia_korban,
            'nama_pelapor,' => $request->nama_pelapor,
            'nama_pelapor,' => $request->nama_pelapor,
            'nama_pelapor,' => $request->nama_pelapor,
            'nama_pelapor,' => $request->nama_pelapor,
            'nama_pelapor,' => $request->nama_pelapor,
            'nama_pelapor,' => $request->nama_pelapor,
            'nama_pelapor,' => $request->nama_pelapor,
            'nama_pelapor,' => $request->nama_pelapor,
            'nama_pelapor,' => $request->nama_pelapor,
            'nama_pelapor,' => $request->nama_pelapor,
            'nama_pelapor,' => $request->nama_pelapor,
            'nama_pelapor,' => $request->nama_pelapor,
            'nama_pelapor,' => $request->nama_pelapor,
            'nama_pelapor,' => $request->nama_pelapor,
            'nama_pelapor,' => $request->nama_pelapor,
            'nama_pelapor,' => $request->nama_pelapor,
            'nama_pelapor,' => $request->nama_pelapor,
            'nama_pelapor,' => $request->nama_pelapor,
            'nama_pelapor,' => $request->nama_pelapor,
            'nama_pelapor,' => $request->nama_pelapor,
            'nama_pelapor,' => $request->nama_pelapor,
            'nama_pelapor,' => $request->nama_pelapor,
            'nama_pelapor,' => $request->nama_pelapor,
            'nama_pelapor,' => $request->nama_pelapor,
            'nama_pelapor,' => $request->nama_pelapor,
            'nama_pelapor,' => $request->nama_pelapor,
            'nama_pelapor,' => $request->nama_pelapor,
            'nama_pelapor,' => $request->nama_pelapor,
            'nama_pelapor,' => $request->nama_pelapor,
            'nama_pelapor,' => $request->nama_pelapor,
            'nama_pelapor,' => $request->nama_pelapor,
            'nama_pelapor,' => $request->nama_pelapor,
            'nama_pelapor,' => $request->nama_pelapor,
            'nama_pelapor,' => $request->nama_pelapor,
            'nama_pelapor,' => $request->nama_pelapor,
            'nama_pelapor,' => $request->nama_pelapor,
            'nama_pelapor,' => $request->nama_pelapor,
            'nama_pelapor,' => $request->nama_pelapor,
            'nama_pelapor,' => $request->nama_pelapor,
            'nama_pelapor,' => $request->nama_pelapor,
            'nama_pelapor,' => $request->nama_pelapor,
            'nama_pelapor,' => $request->nama_pelapor,
        ]);


        // 'foto' => $file_name,
        return redirect()->route('pengaduan.index')
            ->with('success', 'Pengaduan Berhasil Ditambahkan');
    }

    public function show($id)
    {
        // $Pengaduan =  Pengaduan::find($id);
        // return view('admin.pengaduan.Detailpengaduan.index', compact('Pengaduan', 'DetailPengaduan'));
    }


    public function edit($id)
    {
        $Pengaduan = Pengaduan::find($id);
        return view('admin.pengaduan.ubah', compact('Pengaduan'));
    }

    public function update(Request $request, $id)
    {
        $Pengaduan = Pengaduan::findOrFail($id);
        $Pengaduan->pengaduan = $request->pengaduan;
        $Pengaduan->deskripsi = $request->deskripsi;
        $Pengaduan->latitude = $request->latitude;
        $Pengaduan->longitude = $request->longitude;
        $Pengaduan->deskripsi_map = $request->deskripsi_map;
        $Pengaduan->link_map = $request->link_map;

        if ($request->has("foto")) {
            $path = storage_path("app/public/img/pengaduan/");
            if (File::exists($path)) {
                Storage::delete("$path$Pengaduan->foto");
            }
            $extention = $request->foto->extension();
            $file_name = time() . '.' . $extention;
            $image = $request->file('foto');
            $image = Image::make($request->file('foto'));
            $image->resize(720, null, function ($constraint) {
                $constraint->aspectRatio();
            });

            $path = storage_path("app/public/img/pengaduan/");
            if (!File::exists($path)) {
                File::makeDirectory($path, $mode = 0777, true, true);
            }
            $image->save($path . $file_name, 80);

            $Pengaduan->foto = $file_name;
        }
        $Pengaduan->save();
        return redirect()->route('pengaduan.index')
            ->with('success', 'Pengaduan Berhasil Diubah');
    }

    public function destroy($id)
    {
        $Pengaduan = Pengaduan::findOrFail($id);
        Storage::delete("public/Pengaduan/$Pengaduan->foto");
        $Pengaduan->delete();
        return redirect()->route('pengaduan.index')
            ->with('success', 'Pengaduan Berhasil Dihapus');
    }
}
