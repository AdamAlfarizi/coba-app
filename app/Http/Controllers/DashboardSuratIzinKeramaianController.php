<?php

namespace App\Http\Controllers;

use App\Models\SuratIzinKeramaian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardSuratIzinKeramaianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.layanan.surat_izin_keramaian.index', [
            'surat_izin_keramaian' => SuratIzinKeramaian::all()
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
        return view('dashboard.layanan.surat_izin_keramaian.create');
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
            'kegiatan' => 'required|max:255',
            'jenis' => 'required|max:255',
            'image1' => 'image|file|max:1024',
            'image2' => 'image|file|max:1024'
        ]);
        if($request->file('image1')){
            $validatedData['image1'] = $request->file('image1')->store('layanan-images');
        }
        if($request->file('image2')){
            $validatedData['image2'] = $request->file('image2')->store('layanan-images2');
        }

        SuratIzinKeramaian::create($validatedData);

        return redirect('/dashboard/surat_izin_keramaian')->with('success','Pengajuan Suarat Izin Keramaian Succes!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(SuratIzinKeramaian $surat_izin_keramaian)
    {
        return view('dashboard.layanan.surat_izin_keramaian.show', [
            'keramaian'=>$surat_izin_keramaian
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(SuratIzinKeramaian $surat_izin_keramaian)
    {
        return view('dashboard.layanan.surat_izin_keramaian.edit', [
            'keramaian'=>$surat_izin_keramaian
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,SuratIzinKeramaian $surat_izin_keramaian)
    {
        $rules = [
            'nama_pengaju' => 'required|max:255',
            'kegiatan' => 'required|max:255',
            'jenis' => 'required|max:255',
            'image1' => 'image|file|max:1024',
            'image2' => 'image|file|max:1024',
        ];


        $validatedData = $request->validate($rules);


        if($request->file('image1')){
            if($request->oldImage1){
                Storage::delete($request->oldImage1);
            }
            $validatedData['image1'] = $request->file('image1')->store('layanan-images');
        }
        if($request->file('image2')){
            if($request->oldImage2){
                Storage::delete($request->oldImage2);
            }
            $validatedData['image2'] = $request->file('image2')->store('layanan-images2');
        }

        SuratIzinKeramaian::where('id', $surat_izin_keramaian->id)
        ->update($validatedData);

        return redirect('/dashboard/surat_izin_keramaian')->with('success','Suarat Izin keramaian Berhasih di Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SuratIzinKeramaian $surat_izin_keramaian)
    {
        if($surat_izin_keramaian->image1){
            Storage::delete($surat_izin_keramaian->image1);
        }
        if($surat_izin_keramaian->image2){
            Storage::delete($surat_izin_keramaian->image2);
        }
        SuratIzinKeramaian::destroy($surat_izin_keramaian->id);
        return redirect('/dashboard/surat_izin_keramaian')->with('success', 'Surat has been added!');
    
    }
}
