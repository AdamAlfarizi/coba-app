<?php


namespace App\Http\Controllers;

use App\Models\SuratKematian;
use Illuminate\Http\Request;

class KematianController extends Controller
{
public function index()
    {
        return view('layanan.surats.kematian', [
            'kematian' => SuratKematian::all()
        ]);
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_pengaju' =>'required|max:255',
            'no_ktp_si_mati' => 'required|unique:surat_kematians',
            'nama_si_mati' => 'required|max:255',
            'tgl_kematian' => 'required|max:255',
            'tempat_kematian' => 'required|max:255',
            'tempat_pemakaman' => 'required|max:255',
            'ktp_si_mati' => 'required|max:255',
        ]);

        SuratKematian::create($validatedData);

        return redirect('/layanan/surat/kematian')->with('success', 'Pengajuan Surat Berhasil Di Buat');
    }
}