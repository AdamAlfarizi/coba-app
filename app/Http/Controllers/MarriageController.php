<?php

namespace App\Http\Controllers;

use App\Models\Marriage;


class MarriageController extends Controller
{
    public function index()
    {
        $marriage = Marriage::all();
        $data = Marriage::pluck('status');
        $jumlah_data = Marriage::pluck('jumlah');
        return view('data.marriages', compact('marriage', 'data', 'jumlah_data'));
    }
}
