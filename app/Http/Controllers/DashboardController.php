<?php

namespace App\Http\Controllers;

use App\Models\JenisKekerasan;
use App\Models\JenisLayanan;
use App\Models\Pengaduan;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $pengaduan = Pengaduan::count();
        $pengaduanSelesai = Pengaduan::where('status', 'Selesai')->count();
        $recentPengaduan = Pengaduan::orderBy('updated_at', 'DESC')->get();
        $akun = User::all();
        $jenisLayanan = JenisLayanan::all();
        $jenisKekerasan = JenisKekerasan::all();
        $currentYear = Carbon::now()->year;

        $dataJenisKekerasan = DB::table('jenis_kekerasan_pengaduan')
        ->select('jenis_kekerasan', DB::raw('COUNT(*) as total'))
        ->join('jenis_kekerasan', 'jenis_kekerasan.id', '=', 'jenis_kekerasan_pengaduan.jenis_kekerasan_id')
        ->whereYear('jenis_kekerasan_pengaduan.created_at', $currentYear)
        ->groupBy('jenis_kekerasan_id','jenis_kekerasan')
        ->get();

        $dataJenisLayanan = DB::table('jenis_layanan_pengaduan')
        ->select('jenis_layanan', DB::raw('COUNT(*) as total'))
        ->join('jenis_layanan', 'jenis_layanan.id', '=', 'jenis_layanan_pengaduan.jenis_layanan_id')
        ->whereYear('jenis_layanan_pengaduan.created_at', $currentYear)
        ->groupBy('jenis_layanan_id','jenis_layanan')
        ->get();
        // dd($dataJenisLayanan);

        // start alwi
        $pengaduan_total_korban = Pengaduan::select(
            DB::raw("'L' AS jenis_kelamin"),
            DB::raw('SUM(CASE WHEN usia_korban < 18 AND jenis_kelamin_korban = "laki-laki" THEN 1 ELSE 0 END) AS total_dibawah_18'),
            DB::raw('SUM(CASE WHEN usia_korban >= 18 AND jenis_kelamin_korban = "laki-laki" THEN 1 ELSE 0 END) AS total_diatas_18')
        )
            ->unionAll(
                DB::table('pengaduan')->select(
                    DB::raw("'P' AS jenis_kelamin"),
                    DB::raw('SUM(CASE WHEN usia_korban < 18 AND jenis_kelamin_korban = "Perempuan" THEN 1 ELSE 0 END) AS total_dibawah_18'),
                    DB::raw('SUM(CASE WHEN usia_korban >= 18 AND jenis_kelamin_korban = "Perempuan" THEN 1 ELSE 0 END) AS total_diatas_18')
                )
            )
            ->groupBy('jenis_kelamin')
            ->get();

        // end

        $statistikKelurahan = DB::table('pengaduan')
            ->selectRaw('count(*) as total, name ')
            ->join('indonesia_villages', 'indonesia_villages.id', '=', 'pengaduan.kelurahan_korban')
            ->groupBy('indonesia_villages.name')
            ->orderBy('indonesia_villages.name')
            ->get();
        $dataKelurahan = [];
        foreach ($statistikKelurahan as $item) {
            $arrayNameKelurahan[] = $item->name;
            $arrayJumlahKelurahan[] = $item->total;
        }
        $dataKelurahan = array_merge([$arrayNameKelurahan ?? []], [$arrayJumlahKelurahan ?? []]);

        $statistikKecamatan = DB::table('pengaduan')
            ->selectRaw('count(*) as total, name ')
            ->join('indonesia_districts', 'indonesia_districts.id', '=', 'pengaduan.kecamatan_korban')
            ->groupBy('indonesia_districts.name')
            ->orderBy('indonesia_districts.name')
            ->get();
        $dataKecamatan = [];

        foreach ($statistikKecamatan as $item) {
            $arrayName[] = $item->name;
            $arrayJumlah[] = $item->total;
        }
        $dataKecamatan = array_merge([$arrayName ?? []], [$arrayJumlah ?? []]);

        $dataPengaduan = DB::table('pengaduan')
            ->select(DB::raw('MONTH(tanggal_registrasi) as month'), DB::raw('COUNT(*) as total'))
            ->whereYear('tanggal_registrasi', $currentYear)
            ->groupBy(DB::raw('MONTH(tanggal_registrasi)'))
            ->get();

        $arrayPengaduan = [
            1 => 0,
            2 => 0,
            3 => 0,
            4 => 0,
            5 => 0,
            6 => 0,
            7 => 0,
            8 => 0,
            9 => 0,
            10 => 0,
            11 => 0,
            12 => 0,
        ];
        foreach ($dataPengaduan as $item) {
            $arrayPengaduan[$item->month] = $item->total;
        }
        $arrayStatistikPengaduan = implode(', ', $arrayPengaduan);


        $dataPengaduan = DB::table('pengaduan')
            ->select(DB::raw('MONTH(tanggal_registrasi) as month'), DB::raw('COUNT(*) as total'), 'kdrt_nonkdrt')
            ->whereYear('tanggal_registrasi', $currentYear)
            ->groupBy(DB::raw('MONTH(tanggal_registrasi)'), 'kdrt_nonkdrt')
            ->get();

        $arrayKDRT = [
            1 => 0,
            2 => 0,
            3 => 0,
            4 => 0,
            5 => 0,
            6 => 0,
            7 => 0,
            8 => 0,
            9 => 0,
            10 => 0,
            11 => 0,
            12 => 0,
        ];

        $arrayNONKDRT = [
            1 => 0,
            2 => 0,
            3 => 0,
            4 => 0,
            5 => 0,
            6 => 0,
            7 => 0,
            8 => 0,
            9 => 0,
            10 => 0,
            11 => 0,
            12 => 0,
        ];


        foreach ($dataPengaduan as $item) {
            if ($item->kdrt_nonkdrt === 'KDRT') {
                $arrayKDRT[$item->month] = $item->total;
            } else {
                $arrayNONKDRT[$item->month] = $item->total;
            }
        }

        $dataKDRT = array_merge([$arrayKDRT ?? []], [$arrayNONKDRT ?? []]);


        // dd($arrayStatistikPengaduan);
        return view('admin.dashboard', compact('pengaduan', 'dataJenisLayanan', 'dataJenisKekerasan', 'dataKelurahan', 'dataKDRT', 'pengaduanSelesai', 'dataKecamatan', 'akun', 'jenisLayanan', 'jenisKekerasan', 'arrayStatistikPengaduan', 'recentPengaduan', 'pengaduan_total_korban'));
    }
}
