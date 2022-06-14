<?php
namespace App\Http\Controllers;

use App\Models\SuratTidakMampu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SuratTidakMampuController extends Controller
{
    public function index()
    {
        return view('layanan.surat.surat_keterangan_tidak_mampu.index', [
        'surat_tidak_mampu' => SuratTidakMampu::all()
        // 'posts' => Post::where('user_id', auth()->user()->id)->get()
    ]);
    }

    public function store(Request $request )
    {
        $validatedData = $request->validate([
            'nama_pengaju' => 'required|max:255',
            'alamat' => 'required|max:255',
            'no_wa' => 'required|max:255',
            'image1' => 'image|file|max:1024',
            'image2' => 'image|file|max:1024'
        ]);
        if($request->file('image1')){
            $validatedData['image1'] = $request->file('image1')->store('layanan-images1');
        }
        if($request->file('image2')){
            $validatedData['image2'] = $request->file('image2')->store('layanan-images2');
        }

        SuratTidakMampu::create($validatedData);

        return redirect('layanan/surat/surat_keterangan_tidak_mampu')->with('success','Pengajuan Suarat Izin Usaha Succes!');
    }


    public function destroy($id)
    {

        $surat_tidak_mampu = SuratTidakMampu::find($id);
        SuratTidakMampu::destroy($surat_tidak_mampu->id);
        if($surat_tidak_mampu->image1){
            Storage::delete($surat_tidak_mampu->image1);
        }
        if($surat_tidak_mampu->image2){
            Storage::delete($surat_tidak_mampu->image2);
        }
        return redirect('layanan/surat/surat_keterangan_tidak_mampu')->with('success', 'Surat berhasil dihapus!');

        // Program::destroy($program->id);
        // return redirect('layanan/surat/surat_izin_usaha')->with('berhasil', 'Surat has been added!');
    }
}