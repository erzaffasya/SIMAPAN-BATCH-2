<?php

namespace App\Http\Controllers;

use App\Models\JenisKekerasan;
use App\Models\JenisLayanan;
use App\Models\Pengaduan;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Image;

class PengaduanController extends Controller
{
    public function index()
    {
        $Pengaduan = Pengaduan::all();
        return view('admin.pengaduan.index', compact('Pengaduan'));
    }

    public function create()
    {
        $user = User::all();
        $layanan = JenisLayanan::all();
        $kekerasan = JenisKekerasan::all();

        $kota = \Indonesia::search('balikpapan')->allDistricts();
        // dd($kota);
        return view('admin.pengaduan.tambah', compact('user', 'layanan', 'kekerasan', 'kota'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        // $request->validate([
        //     // 'ft' => 'required'
        // ]);

        function convertToRoman($num)
        {
            $romans = array(
                'I',
                'II',
                'III',
                'IV',
                'V',
                'VI',
                'VII',
                'VIII',
                'IX',
                'X',
                'XI',
                'XII'
            );

            if ($num >= 1 && $num <= 12) {
                return $romans[$num - 1];
            } else {
                return "";
            }
        }
        $carbonTanggal = Carbon::createFromFormat("Y-m-d", $request->tanggal_registrasi);
        $bulan = $carbonTanggal->format('n');
        $tahun = $carbonTanggal->format('Y');
        $roman_bulan = convertToRoman($bulan);
        //create nomor
        $max = Pengaduan::selectRaw("MAX(CAST(SUBSTRING_INDEX(SUBSTRING_INDEX(nomor, '/', 1), '/', -1) AS UNSIGNED)) AS max_urut")->pluck("max_urut")->first();
        if ($max) {
            $new_urut = str_pad($max + 1, 3, '0', STR_PAD_LEFT);
            $nomor = "$new_urut/PG/$roman_bulan/$tahun";
        } else {
            $nomor = "001/PG/$roman_bulan/$tahun";
        }

        if (isset($request->akta)) {
            $extention = $request->akta->extension();
            $fileakta = time() . '.' . $extention;
            $dataakta = "storage/akta/" . $fileakta;
            $request->akta->storeAs('public/akta', $fileakta);
        } else {
            $dataakta = null;
        }

        if (isset($request->ktp)) {
            $extention = $request->ktp->extension();
            $filektp = time() . '.' . $extention;
            $dataktp = "storage/ktp/" . $filektp;
            $request->ktp->storeAs('public/ktp', $filektp);
        } else {
            $dataktp = null;
        }


        if (isset($request->kk)) {
            $extention = $request->kk->extension();
            $filekk = time() . '.' . $extention;
            $datakk = "storage/kk/" . $filekk;
            $request->kk->storeAs('public/kk', $filekk);
        } else {
            $datakk = null;
        }

        if (isset($request->fotokorban)) {
            $extention = $request->fotokorban->extension();
            $filefotokorban = time() . '.' . $extention;
            $datafotokorban = "storage/fotokorban/" . $filefotokorban;
            $request->fotokorban->storeAs('public/fotokorban', $filefotokorban);
        } else {
            $datafotokorban = null;
        }

        // dd($request->signature);

        $data_uri = $request->signature;
        $encoded_image = explode(",", $data_uri)[1];
        $decoded_image = base64_decode($encoded_image);
        $path = storage_path("app/public/ttd/");
        $filettd = uniqid() . '.png';
        $file = $path . $filettd;

        if (!File::exists($path)) {
            File::makeDirectory($path, $mode = 0777, true, true);
        }

        file_put_contents($file, $decoded_image);


        $Pengaduan = Pengaduan::create([
            'nomor' => $nomor,
            'tanggal_registrasi' => $request->tanggal_registrasi,
            'petugas_penerima' => $request->petugas_penerima,
            'petugas_menangani' => $request->petugas_menangani,
            'jenis_aduan' => $request->jenis_aduan,

            'nama_pelapor' => $request->nama_pelapor,
            'jenis_kelamin_pelapor' => $request->jenis_kelamin_pelapor,
            'alamat_pelapor' => $request->alamat_pelapor,
            'hp_pelapor' => $request->hp_pelapor,
            'hubungan_korban' => $request->hubungan_korban,

            'nama_korban' => $request->nama_korban,
            'nama_alias_korban' => $request->nama_alias_korban,
            'nik_korban' => $request->nik_korban,
            'jenis_kelamin_korban' => $request->jenis_kelamin_korban,
            'lahir_korban' => $request->lahir_korban,
            'usia_korban' => $request->usia_korban,
            'alamat_korban' => $request->alamat_korban,
            'kelurahan_korban' => $request->kelurahan_korban,
            'kecamatan_korban' => $request->kecamatan_korban,
            'pendidikan_korban' => $request->pendidikan_korban,
            'agama_korban' => $request->agama_korban,
            'suku_korban' => $request->suku_korban,
            'kewarganegaraan_korban' => $request->kewarganegaraan_korban,
            'pekerjaan_korban' => $request->pekerjaan_korban,
            'jenis_kelamin_korban' => $request->jenis_kelamin_korban,

            'nama_pelaku' => $request->nama_pelaku,
            'jenis_kelamin_pelaku' => $request->jenis_kelamin_pelaku,
            'lahir_pelaku' => $request->lahir_pelaku,
            'usia_pelaku' => $request->usia_pelaku,
            'alamat_pelaku' => $request->alamat_pelaku,
            'pendidikan_pelaku' => $request->pendidikan_pelaku,
            'agama_pelaku' => $request->agama_pelaku,
            'suku_pelaku' => $request->suku_pelaku,
            'pekerjaan_pelaku' => $request->pekerjaan_pelaku,
            'hubungan_pelaku' => $request->hubungan_pelaku,

            'tempat_kejadian' => $request->tempat_kejadian,
            'kdrt_nonkdrt' => $request->kdrt_nonkdrt,
            'kronologis' => $request->kronologis,
            'status' => $request->status,
            'keterangan' => $request->keterangan,
            'ttd' => $filettd,
            'akta' => $dataakta,
            'ktp' => $dataktp,
            'kk' => $datakk,
            'foto_korban' => $datafotokorban
        ]);

        // dd($request->all());
        for ($i = 0; $i < count($request->jenis_layanan); $i++) {
            $dataLayanan[] = [
                'pengaduan_id' => $Pengaduan->id,
                'jenis_layanan_id' => $request->jenis_layanan[$i]
            ];
        }

        $Pengaduan->jenisLayanan()->createMany($dataLayanan);


        for ($i = 0; $i < count($request->jenis_kekerasan); $i++) {
            $dataKekerasan[] = [
                'pengaduan_id' => $Pengaduan->id,
                'jenis_kekerasan_id' => $request->jenis_kekerasan[$i]
            ];
        }

        $Pengaduan->jenisKekerasan()->createMany($dataKekerasan);
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
