<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratKeteranganMeninggal extends Model
{
    use HasFactory;
    protected $table = 'surat_kematian';
    protected $guarded = ['id'];
}
