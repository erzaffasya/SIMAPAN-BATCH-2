<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisKekerasan extends Model
{
    use HasFactory;
    protected $table = 'jenis_kekerasan';
    protected $guarded = [];

    protected $primaryKey = 'id';
}
