<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratIzinUsaha extends Model
{
    use HasFactory;
    protected $table = 'surat_izin_usaha';
    protected $guarded = ['id'];
}
