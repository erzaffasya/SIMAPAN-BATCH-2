<?php

namespace App\Http\Controllers;

use App\Exports\PengaduanExport;
use App\Models\JenisKekerasan;
use App\Models\JenisKekerasanPengaduan;
use App\Models\JenisLayanan;
use App\Models\JenisLayananPengaduan;
use App\Models\Pengaduan;
use App\Models\User;
use Carbon\Carbon;
use Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Image;

class PengaduanController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->query("status");
        $year = $request->query("year");

        $Pengaduan = Pengaduan::query();

        if ($status) {
            $Pengaduan = $Pengaduan->where("status", $status);
        }

        if ($year) {
            $Pengaduan = $Pengaduan->whereYear("tanggal_registrasi", $year);
        }
        $Pengaduan = $Pengaduan->get();
        return view('admin.pengaduan.index', compact('Pengaduan', "year", "status"));
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

        // Create nomor
        $max = Pengaduan::selectRaw("MAX(CAST(SUBSTRING_INDEX(SUBSTRING_INDEX(nomor, '/', 1), '.', -1) AS UNSIGNED)) AS max_urut")->pluck("max_urut")->first();
        if ($max) {
            $new_urut = str_pad($max + 1, 3, '0', STR_PAD_LEFT);
            $nomor = "REG. " . $new_urut . "/UPTD PPA/" . $roman_bulan . "/" . $tahun;
        } else {
            $nomor = "REG.001/UPTD PPA/" . $roman_bulan . "/" . $tahun;
        }

        if (isset($request->akta)) {
            $extension = $request->akta->extension();
            $fileakta = time() . '.' . $extension;
            $path = storage_path('app/public/akta/');
            $dataakta = "storage/akta/" . $fileakta;

            if (!File::exists($path)) {
                File::makeDirectory($path, $mode = 0777, true, true);
            }

            $request->akta->storeAs('public/akta', $fileakta);
        } else {
            $dataakta = null;
        }


        if (isset($request->ktp)) {
            $extention = $request->ktp->extension();
            $filektp = time() . '.' . $extention;
            $path = storage_path('app/public/ktp/');
            $dataktp = "storage/ktp/" . $filektp;

            if (!File::exists($path)) {
                File::makeDirectory($path, $mode = 0777, true, true);
            }
            $request->ktp->storeAs('public/ktp', $filektp);
        } else {
            $dataktp = null;
        }


        if (isset($request->kk)) {
            $extention = $request->kk->extension();
            $filekk = time() . '.' . $extention;
            $path = storage_path('app/public/kk/');
            $datakk = "storage/kk/" . $filekk;

            if (!File::exists($path)) {
                File::makeDirectory($path, $mode = 0777, true, true);
            }
            $request->kk->storeAs('public/kk', $filekk);
        } else {
            $datakk = null;
        }

        if (isset($request->foto_korban)) {
            $extention = $request->foto_korban->extension();
            $filefotokorban = time() . '.' . $extention;
            $path = storage_path('app/public/fotokorban/');
            $datafotokorban = "storage/fotokorban/" . $filefotokorban;

            if (!File::exists($path)) {
                File::makeDirectory($path, $mode = 0777, true, true);
            }
            $request->foto_korban->storeAs('public/fotokorban', $filefotokorban);
        } else {
            $datafotokorban = null;
        }

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
            'difabel_nondifabel' => $request->difabel_nondifabel,
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
        $pengaduan = Pengaduan::with(["jenisLayanan", "jenisKekerasan"])->where("id", $id)->first();
        return view('admin.pengaduan.view', compact('pengaduan'));
    }


    public function edit($id)
    {

        $user = User::all();
        $layanan = JenisLayanan::all();
        $kekerasan = JenisKekerasan::all();
        $kota = \Indonesia::search('balikpapan')->allDistricts();

        $pengaduan = Pengaduan::findOrFail($id);
        return view('admin.pengaduan.ubah', compact('pengaduan', 'user', 'layanan', 'kekerasan', 'kota'));
    }

    public function update(Request $request, $id)
    {
        $pengaduan = Pengaduan::findOrFail($id);

        $pengaduan->nomor = $request->nomor;
        $pengaduan->tanggal_registrasi = $request->tanggal_registrasi;
        $pengaduan->petugas_penerima = $request->petugas_penerima;
        $pengaduan->petugas_menangani = $request->petugas_menangani;
        $pengaduan->jenis_aduan = $request->jenis_aduan;

        $pengaduan->nama_pelapor = $request->nama_pelapor;
        $pengaduan->jenis_kelamin_pelapor = $request->jenis_kelamin_pelapor;
        $pengaduan->alamat_pelapor = $request->alamat_pelapor;
        $pengaduan->hp_pelapor = $request->hp_pelapor;
        $pengaduan->hubungan_korban = $request->hubungan_korban;

        $pengaduan->nama_korban = $request->nama_korban;
        $pengaduan->nama_alias_korban = $request->nama_alias_korban;
        $pengaduan->nik_korban = $request->nik_korban;
        $pengaduan->jenis_kelamin_korban = $request->jenis_kelamin_korban;
        $pengaduan->lahir_korban = $request->lahir_korban;
        $pengaduan->difabel_nondifabel = $request->difabel_nondifabel;
        $pengaduan->usia_korban = $request->usia_korban;
        $pengaduan->alamat_korban = $request->alamat_korban;
        $pengaduan->kelurahan_korban = $request->kelurahan_korban;
        $pengaduan->kecamatan_korban = $request->kecamatan_korban;
        $pengaduan->pendidikan_korban = $request->pendidikan_korban;
        $pengaduan->suku_korban = $request->suku_korban;
        $pengaduan->agama_korban = $request->agama_korban;
        $pengaduan->kewarganegaraan_korban = $request->kewarganegaraan_korban;
        $pengaduan->pekerjaan_korban = $request->pekerjaan_korban;

        $pengaduan->nama_pelaku = $request->nama_pelaku;
        $pengaduan->jenis_kelamin_pelaku = $request->jenis_kelamin_pelaku;
        $pengaduan->lahir_pelaku = $request->lahir_pelaku;
        $pengaduan->usia_pelaku = $request->usia_pelaku;
        $pengaduan->alamat_pelaku = $request->alamat_pelaku;
        $pengaduan->pendidikan_pelaku = $request->pendidikan_pelaku;
        $pengaduan->agama_pelaku = $request->agama_pelaku;
        $pengaduan->suku_pelaku = $request->suku_pelaku;
        $pengaduan->pekerjaan_pelaku = $request->pekerjaan_pelaku;
        $pengaduan->hubungan_pelaku = $request->hubungan_pelaku;

        $pengaduan->tempat_kejadian = $request->tempat_kejadian;
        $pengaduan->kdrt_nonkdrt = $request->kdrt_nonkdrt;
        $pengaduan->kronologis = $request->kronologis;
        $pengaduan->status = $request->status;
        $pengaduan->keterangan = $request->keterangan;

        $pengaduan->tandatangan_pelapor = $request->tandatangan_pelapor;

        function saveStorage($pengaduan, $request, $name)
        {
            if ($file = $request->{$name}) {
                if ($pengaduan->{$name} != null) {
                    if (Storage::exists("app/public" . str_replace("storage", "", $pengaduan->{$name}))) {
                        Storage::delete("app/public" . str_replace("storage", "", $pengaduan->{$name}));
                    }
                }
                $filename = time() . '.' . $file->extension();
                $file->storeAs("public/$name", $filename);
                $pengaduan->{$name} = "storage/$name/" . $filename;
            }
        }
        saveStorage($pengaduan, $request, "ktp");
        saveStorage($pengaduan, $request, "foto_korban");
        saveStorage($pengaduan, $request, "akta");
        saveStorage($pengaduan, $request, "kk");
        saveStorage($pengaduan, $request, "dokumen");

        $pengaduan->save();
        return redirect()->route('pengaduan.index')
            ->with('success', 'Pengaduan Berhasil Diubah');
    }

    public function destroy($id)
    {
        JenisLayananPengaduan::where('pengaduan_id', $id)->delete();
        JenisKekerasanPengaduan::where('pengaduan_id', $id)->delete();
        $Pengaduan = Pengaduan::findOrFail($id);
        Storage::delete("public/Pengaduan/$Pengaduan->foto");
        $Pengaduan->delete();
        return redirect()->route('pengaduan.index')
            ->with('success', 'Pengaduan Berhasil Dihapus');
    }

    public function export(Request $request)
    {
        $status = $request->query("status");
        $year = $request->query("year");

        return Excel::download(new PengaduanExport($status, $year), 'pengaduan.xlsx');
    }
}
