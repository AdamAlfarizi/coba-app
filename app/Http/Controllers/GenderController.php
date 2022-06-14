<?php

namespace App\Http\Controllers;

use App\Models\Gender;


class GenderController extends Controller
{
    public function index()
    {
        $gender = Gender::all();
        $data = Gender::pluck('jenis');
        $jumlah_data = Gender::pluck('jumlah');
        return view('data.genders', compact('gender', 'data', 'jumlah_data'));
    }
}
