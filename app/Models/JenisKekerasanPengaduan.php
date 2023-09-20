<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisKekerasanPengaduan extends Model
{
    use HasFactory;
    protected $table = 'jenis_kekerasan_pengaduan';
    protected $guarded = [];

    protected $primaryKey = 'id';
}
