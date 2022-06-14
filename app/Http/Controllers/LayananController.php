<?php


namespace App\Http\Controllers;

use App\Models\LayananMandiri;
use App\Models\SuratKematian;
use App\Models\TidakMampu;
use Illuminate\Http\Request;

class LayananController extends Controller
{
public function index()
    {
        return view('layanan.index', [
            'layanan' => LayananMandiri::all()
        ]);
    }
    public function tidakMampu()
    {
        return view('layanan.surats.mampu', [
            'mampu' => TidakMampu::all()
        ]);
    }
}