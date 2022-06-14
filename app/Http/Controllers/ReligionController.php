<?php

namespace App\Http\Controllers;

use App\Models\Religion;


class ReligionController extends Controller
{
    public function index()
    {
        $religion = Religion::all();
        $data = Religion::pluck('agama');
        $jumlah_data = Religion::pluck('jumlah');
        return view('data.religions', compact('religion', 'data', 'jumlah_data'));
    }
}
