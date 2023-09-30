<?php

namespace App\Exports;

use App\Models\Pengaduan;
use Illuminate\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;

class PengaduanExport implements WithColumnFormatting, FromView
{
    protected $year;
    protected $compound;
    protected $size;
    protected $status;

    public function __construct(string $status = null, string $year = null)
    {
        $this->year = $year;
        $this->status = $status;
    }
    /**
     * @return \Illuminate\Support\Collection
     */
    public function columnFormats(): array
    {
        return [
            'B' => NumberFormat::FORMAT_DATE_DDMMYYYY,
            'O' => NumberFormat::FORMAT_DATE_DDMMYYYY,
            'AA' => NumberFormat::FORMAT_DATE_DDMMYYYY,
            'M' => "#",
        ];
    }

    public function view(): View
    {
        $pengaduan = Pengaduan::with(
            [
                "kelurahanKorban",
                "kecamatanKorban",
                "petugasMenangani",
                "petugasPenerima",
                "jenisKekerasan",
                "lJenisKekerasan",
                "lJenisLayanan",
                "jenisLayanan",
            ]
        );

        if ($this->status) {
            $pengaduan = $pengaduan->where("status", $this->status);
        }

        if ($this->year) {
            $pengaduan = $pengaduan->whereYear("tanggal_registrasi", $this->year);
        }
        $pengaduan = $pengaduan->get();

        return view("admin.export.pengaduan", compact("pengaduan"));
    }
}