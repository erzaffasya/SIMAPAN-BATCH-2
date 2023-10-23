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

        // $statistikJenisKekerasan = DB::table('pengaduan')
        //     ->selectRaw('count(*) as total, name ')
        //     ->join('jenis_layanan_pengaduan', 'indonesia_villages.id', '=', 'jenis_layanan_pengaduan.jenis')
        //     ->groupBy('indonesia_villages.name')
        //     ->orderBy('indonesia_villages.name')
        //     ->get();
        // $dataJenisKekerasan = [];
        // foreach ($statistikJenisKekerasan as $item) {
        //     $arrayJenis[] = $item->name;
        //     $arrayTotalJenis[] = $item->total;
        // }
        // $dataJenisKekerasan = array_merge([$arrayJenis ?? []], [$arrayTotalJenis ?? []]);

        //Perkecamatan
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

        //Perkelurahan
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

        // dd($dataKelurahan);
        //Pengaduan
        $dataPengaduan = DB::table('pengaduan')
            ->select(DB::raw('MONTH(created_at) as month'), DB::raw('COUNT(*) as total'))
            ->whereYear('created_at', $currentYear)
            ->groupBy(DB::raw('MONTH(created_at)'))
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

        //Jenis Aduan
        $dataPengaduan = DB::table('pengaduan')
            ->select(DB::raw('MONTH(created_at) as month'), DB::raw('COUNT(*) as total'), 'jenis_aduan')
            ->whereYear('created_at', $currentYear)
            ->groupBy(DB::raw('MONTH(created_at)'), 'jenis_aduan')
            ->get();
        $arrayKekerasan = [
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
        $arrayNonKekerasan = [
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
            if ($item->jenis_aduan === 'Kekerasan') {
                $arrayKekerasan[$item->month] = $item->total;
            } else {
                $arrayNonKekerasan[$item->month] = $item->total;
            }
        }
        $dataKDRT = array_merge([$arrayKekerasan ?? []], [$arrayNonKekerasan ?? []]);

        //JenisKelaminKorban
        $dataJenisKelamin = DB::table('pengaduan')
            ->select(DB::raw('MONTH(created_at) as month'), DB::raw('COUNT(*) as total'), 'jenis_kelamin_korban')
            ->whereYear('created_at', $currentYear)
            ->groupBy(DB::raw('MONTH(created_at)'), 'jenis_kelamin_korban')
            ->get();
        $arrayLakiLaki = [
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
        $arrayPerempuan = [
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
        foreach ($dataJenisKelamin as $item) {
            if ($item->jenis_kelamin_korban === 'Laki-Laki') {
                $arrayLakiLaki[$item->month] = $item->total;
            } else {
                $arrayPerempuan[$item->month] = $item->total;
            }
        }
        $dataJenisKelamin = array_merge([$arrayLakiLaki ?? []], [$arrayPerempuan ?? []]);

        // dd($arrayStatistikPengaduan);
        return view('admin.dashboard', compact('pengaduan', 'dataKelurahan', 'dataJenisKelamin', 'dataKDRT', 'pengaduanSelesai', 'dataKecamatan', 'akun', 'jenisLayanan', 'jenisKekerasan', 'arrayStatistikPengaduan', 'recentPengaduan'));
    }
}
