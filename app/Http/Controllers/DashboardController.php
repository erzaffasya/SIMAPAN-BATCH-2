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
        $pengaduanSelesai = Pengaduan::where('status','Selesai')->count();
        $recentPengaduan = Pengaduan::orderBy('updated_at', 'DESC')->get();
        $akun = User::all();
        $jenisLayanan = JenisLayanan::all();
        $jenisKekerasan = JenisKekerasan::all();
        $currentYear = Carbon::now()->year;

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
        $dataKecamatan = array_merge([$arrayName??[]], [$arrayJumlah??[]]);

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


        $dataPengaduan = DB::table('pengaduan')
            ->select(DB::raw('MONTH(created_at) as month'), DB::raw('COUNT(*) as total'), 'kdrt_nonkdrt')
            ->whereYear('created_at', $currentYear)
            ->groupBy(DB::raw('MONTH(created_at)'), 'kdrt_nonkdrt')
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

        $dataKDRT = array_merge([$arrayKDRT??[]], [$arrayNONKDRT??[]]);


        // dd($arrayStatistikPengaduan);
        return view('admin.dashboard', compact('pengaduan', 'dataKDRT', 'pengaduanSelesai', 'dataKecamatan', 'akun', 'jenisLayanan', 'jenisKekerasan', 'arrayStatistikPengaduan', 'recentPengaduan'));
    }
}
