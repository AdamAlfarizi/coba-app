<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LayananMandiri extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function kematian()
    {
        return $this->hasMany(SuratKematian::class);
    }
}
