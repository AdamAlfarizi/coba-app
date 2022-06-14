<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SuratIzinUsaha;
use Illuminate\Support\Facades\Storage;

class SuratIzinUsahaController extends Controller
{
    public function index()
    {
        return view('layanan.surat.surat_izin_usaha.index', [
            'surat_izin_usaha' => SuratIzinUsaha::all()
            // 'posts' => Post::where('user_id', auth()->user()->id)->get()
        ]);
    }

    public function store(Request $request )
    {
        $validatedData = $request->validate([
            'nama_pengaju' => 'required|max:255',
            'nama_usaha' => 'required|max:255',
            'jenis_usaha' => 'required|max:255',
            'image1' => 'image|file|max:1024',
            'image2' => 'image|file|max:1024'
        ]);
        if($request->file('image1')){
            $validatedData['image1'] = $request->file('image1')->store('layanan-images1');
        }
        if($request->file('image2')){
            $validatedData['image2'] = $request->file('image2')->store('layanan-images2');
        }

        SuratIzinUsaha::create($validatedData);

        return redirect('layanan/surat/surat_izin_usaha')->with('success','Pengajuan Suarat Izin Usaha Succes!');
    }

    public function destroy($id)
    {

        $surat_izin_usaha = SuratIzinUsaha::find($id);
        SuratIzinUsaha::destroy($surat_izin_usaha->id);
        if($surat_izin_usaha->image1){
            Storage::delete($surat_izin_usaha->image1);
        }
        if($surat_izin_usaha->image2){
            Storage::delete($surat_izin_usaha->image2);
        }
        return redirect('layanan/surat/surat_izin_usaha')->with('success', 'Surat has been added!');

        // Program::destroy($program->id);
        // return redirect('layanan/surat/surat_izin_usaha')->with('berhasil', 'Surat has been added!');
    }
    
}