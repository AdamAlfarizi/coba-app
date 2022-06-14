<?php

namespace App\Http\Controllers;

use App\Models\SuratKematian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardSuratKeteranganMeninggalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.layanan.surat_keterangan_meninggal.index', [
            'surat_kematian' => SuratKematian::all()
            // 'posts' => Post::where('user_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.layanan.surat_keterangan_meninggal.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_pengaju' => 'required|max:255',
            'nama_yang_meninggal' => 'required|max:255',
            'no_ktp_yang_meninggal' => 'required|max:255',
            'tgl_meninggal' => 'required|max:255',
            'jenis_kelamin_yang_meninggal' => 'required|max:255',
            'tempat_meninggal' => 'required|max:255',
            'tempat_pemakaman' => 'required|max:255',
            'alamat_yang_meninggal' => 'required|max:255',
            'kewarganegaraan_yang_meninggal' => 'required|max:255',
            'image1' => 'image|file|max:1024',
            'image2' => 'image|file|max:1024'
        ]);
        if($request->file('image1')){
            $validatedData['image1'] = $request->file('image1')->store('layanan-images');
        }
        if($request->file('image2')){
            $validatedData['image2'] = $request->file('image2')->store('layanan-images2');
        }

        SuratKematian::create($validatedData);

        return redirect('/dashboard/surat_keterangan_meninggal')->with('success','Pengajuan Suarat Surat Kematian Succes!');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(SuratKematian $surat_kematian)
    {
        return view('dashboard.layanan.surat_keterangan_meninggal.show', [
            'kematian'=>$surat_kematian
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(SuratKematian $surat_kematian)
    {
        return view('dashboard.layanan.surat_keterangan_meninggal.edit', [
            'kematian'=>$surat_kematian
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
