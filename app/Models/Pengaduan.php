<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}