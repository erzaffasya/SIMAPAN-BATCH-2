<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravolt\Indonesia\Models\Kecamatan;
use Laravolt\Indonesia\Models\Kelurahan;

class Pengaduan extends Model
{
    use HasFactory;
    protected $table = 'pengaduan';
    protected $guarded = [];

    protected $primaryKey = 'id';

    protected $casts = [
        "tanggal_registrasi" => "date:Y-m-d",
        "lahir_korban" => "date:Y-m-d",
        "lahir_pelaku" => "date:Y-m-d",
    ];

    function jenisLayanan()
    {
        return $this->hasMany(JenisLayananPengaduan::class);
    }

    function jenisKekerasan()
    {
        return $this->hasMany(JenisKekerasanPengaduan::class);
    }

    function lJenisLayanan()
    {
        return $this->hasManyThrough(JenisLayanan::class, JenisLayananPengaduan::class, "pengaduan_id", "id", "id", "jenis_layanan_id");
    }

    function lJenisKekerasan()
    {
        return $this->hasManyThrough(JenisKekerasan::class, JenisKekerasanPengaduan::class, "pengaduan_id", "id", "id", "jenis_kekerasan_id");
    }


    function petugasPenerima()
    {
        return $this->belongsTo(User::class, "petugas_penerima");
    }

    function petugasMenangani()
    {
        return $this->belongsTo(User::class, "petugas_menangani");
    }

    function kecamatanKorban()
    {
        return $this->belongsTo(Kecamatan::class, "kecamatan_korban");
    }

    function kelurahanKorban()
    {
        return $this->belongsTo(Kelurahan::class, "kelurahan_korban");
    }
}