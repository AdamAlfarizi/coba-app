<?php

namespace App\Http\Controllers;

use App\Models\Education;


class EducationController extends Controller
{
    public function index()
    {
        $education = Education::all();
        $data = Education::pluck('pendidikan');
        $jumlah_data = Education::pluck('jumlah');
        return view('data.educations', compact('education', 'data', 'jumlah_data'));
    }
}
