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

    function jenisLayanan()
    {
        return $this->hasMany(JenisLayananPengaduan::class);
    }

    function jenisKekerasan()
    {
        return $this->hasMany(JenisKekerasanPengaduan::class);
    }
}
