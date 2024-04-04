<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\JenisKekerasan;
use App\Models\JenisLayanan;
use App\Models\Pengaduan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatistikController extends Controller
{

    public function grafikKDRT()
    {
        $currentYear = Carbon::now()->year;
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
                $arrayKDRT[$item->month] = (int)$item->total;
            } else {
                $arrayNONKDRT[$item->month] = (int)$item->total;
            }
        }

        $dataKDRT = array_merge([$arrayKDRT ?? []], [$arrayNONKDRT ?? []]);
        return response()->json($dataKDRT, 201);
    }

    public function totalKasus()
    {
        $pengaduan_total_korban = Pengaduan::select(
            DB::raw("'L' AS jenis_kelamin"),
            DB::raw('SUM(CASE WHEN usia_korban < 18 AND jenis_kelamin_korban = "laki-laki" THEN 1 ELSE 0 END) AS total_dibawah_18'),
            DB::raw('SUM(CASE WHEN usia_korban >= 18 AND jenis_kelamin_korban = "laki-laki" THEN 1 ELSE 0 END) AS total_diatas_18')
        )
            ->unionAll(
                Pengaduan::select(
                    DB::raw("'P' AS jenis_kelamin"),
                    DB::raw('SUM(CASE WHEN usia_korban < 18 AND jenis_kelamin_korban = "Perempuan" THEN 1 ELSE 0 END) AS total_dibawah_18'),
                    DB::raw('SUM(CASE WHEN usia_korban >= 18 AND jenis_kelamin_korban = "Perempuan" THEN 1 ELSE 0 END) AS total_diatas_18')
                )
            )
            ->groupBy('jenis_kelamin')
            ->get();
        return response()->json($pengaduan_total_korban, 201);
    }

    public function grafikJenisKekerasan()
    {
        $currentYear = Carbon::now()->year;
        $dataJenisKekerasan = DB::table('jenis_kekerasan_pengaduan')
            ->join('jenis_kekerasan', 'jenis_kekerasan.id', '=', 'jenis_kekerasan_pengaduan.jenis_kekerasan_id')
            ->join('pengaduan', 'jenis_kekerasan_pengaduan.pengaduan_id', '=', 'pengaduan.id')
            ->select('jenis_kekerasan.jenis_kekerasan', DB::raw('COUNT(*) as total'))
            ->whereYear('pengaduan.tanggal_registrasi', $currentYear)
            ->groupBy('jenis_kekerasan.jenis_kekerasan')
            ->get();
        return response()->json($dataJenisKekerasan, 201);
    }
    

    public function grafikJenisLayanan()
    {
        $currentYear = Carbon::now()->year;
        $dataJenisLayanan = DB::table('jenis_layanan_pengaduan')
            ->join('jenis_layanan', 'jenis_layanan.id', '=', 'jenis_layanan_pengaduan.jenis_layanan_id')
            ->join('pengaduan', 'jenis_layanan_pengaduan.pengaduan_id', '=', 'pengaduan.id')
            ->select('jenis_layanan.jenis_layanan', DB::raw('COUNT(*) as total'))
            ->whereYear('pengaduan.tanggal_registrasi', $currentYear)
            ->groupBy('jenis_layanan.jenis_layanan')
            ->get();
        return response()->json($dataJenisLayanan, 201);
    }
    

    public function grafikPerkecamatan()
    {
        $statistikKecamatan = DB::table('pengaduan')
            ->selectRaw('count(*) as total, name ')
            ->join('indonesia_districts', 'indonesia_districts.id', '=', 'pengaduan.kecamatan_korban')
            ->groupBy('indonesia_districts.name')
            ->orderBy('indonesia_districts.name')
            ->get();
        $dataKecamatan = [];

        foreach ($statistikKecamatan as $item) {
            $arrayName[] = $item->name;
            $arrayJumlah[] = (int)$item->total;
        }
        $dataKecamatan = array_merge([$arrayName ?? []], [$arrayJumlah ?? []]);
        return response()->json($dataKecamatan, 201);
    }

    public function grafikPerkelurahan()
    {
        $statistikKelurahan = DB::table('pengaduan')
            ->selectRaw('count(*) as total, name ')
            ->join('indonesia_villages', 'indonesia_villages.id', '=', 'pengaduan.kelurahan_korban')
            ->groupBy('indonesia_villages.name')
            ->orderBy('indonesia_villages.name')
            ->get();
        $dataKelurahan = [];
        foreach ($statistikKelurahan as $item) {
            $arrayNameKelurahan[] = $item->name;
            $arrayJumlahKelurahan[] = (int)$item->total;
        }
        $dataKelurahan = array_merge([$arrayNameKelurahan ?? []], [$arrayJumlahKelurahan ?? []]);
        return response()->json($dataKelurahan, 201);
    }

    public function grafikPengaduan()
    {
        $currentYear = Carbon::now()->year;
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
            $arrayPengaduan[$item->month] = (int)$item->total;
        }
        return response()->json($arrayPengaduan, 201);
    }
}
