<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratIzinKeramaian extends Model
{
    use HasFactory;
    protected $table = 'surat_izin_keramaian';
    protected $guarded = ['id'];
}
