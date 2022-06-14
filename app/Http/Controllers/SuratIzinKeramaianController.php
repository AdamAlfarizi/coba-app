<?php

namespace App\Http\Controllers;

use App\Models\SuratIzinKeramaian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SuratIzinKeramaianController extends Controller
{
    public function index()
    {
        return view('layanan.surat.surat_izin_keramaian.index', [
            'surat_izin_keramaian' => SuratIzinKeramaian::all()
            // 'posts' => Post::where('user_id', auth()->user()->id)->get()
        ]);
    }

    public function store(Request $request )
    {
        $validatedData = $request->validate([
            'nama_pengaju' => 'required|max:255',
            'kegiatan' => 'required|max:255',
            'jenis' => 'required|max:255',
            'image1' => 'image|file|max:1024',
            'image2' => 'image|file|max:1024'
        ]);
        if($request->file('image1')){
            $validatedData['image1'] = $request->file('image1')->store('layanan-images1');
        }
        if($request->file('image2')){
            $validatedData['image2'] = $request->file('image2')->store('layanan-images2');
        }

        SuratIzinKeramaian::create($validatedData);

        return redirect('layanan/surat/surat_izin_keramaian')->with('success','Pengajuan Suarat Izin Keramaian Succes!');
    }

    public function destroy($id)
    {

        $surat_izin_keramaian = SuratIzinKeramaian::find($id);
        SuratIzinKeramaian::destroy($surat_izin_keramaian->id);
        if($surat_izin_keramaian->image1){
            Storage::delete($surat_izin_keramaian->image1);
        }
        if($surat_izin_keramaian->image2){
            Storage::delete($surat_izin_keramaian->image2);
        }
        return redirect('layanan/surat/surat_izin_keramaian')->with('success', 'Surat has been added!');

        // Program::destroy($program->id);
        // return redirect('layanan/surat/surat_izin_keramaian')->with('berhasil', 'Surat has been added!');
    }

}