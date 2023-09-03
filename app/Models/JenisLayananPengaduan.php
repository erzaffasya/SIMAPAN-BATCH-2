<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisLayananPengaduan extends Model
{
    use HasFactory;
    protected $table = 'jenis_layanan_pengaduan';
    protected $guarded = [];

    protected $primaryKey = 'id';
}
