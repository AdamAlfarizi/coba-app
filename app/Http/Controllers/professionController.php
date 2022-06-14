<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Profession;
use App\Models\User;


class ProfessionController extends Controller
{
    public function index()
    {
        $profession = Profession::all();
        $data = Profession::pluck('kelompok');
        $jumlah_data = Profession::pluck('jumlah');
        return view('data.professions', compact('profession', 'data', 'jumlah_data'));
    }
}
