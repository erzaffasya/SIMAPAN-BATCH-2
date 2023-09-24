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
        $recentPengaduan = Pengaduan::orderBy('updated_at','DESC')->get();
        $akun = User::all();
        $jenisLayanan = JenisLayanan::all();
        $jenisKekerasan = JenisKekerasan::all();
        $currentYear = Carbon::now()->year;

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
        

        return view('admin.dashboard', compact('pengaduan', 'akun', 'jenisLayanan', 'jenisKekerasan','arrayStatistikPengaduan', 'recentPengaduan'));
    }
}
