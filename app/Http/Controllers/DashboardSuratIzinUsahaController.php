<?php

namespace App\Http\Controllers;

use App\Models\SuratIzinUsaha;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class DashboardSuratIzinUsahaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.layanan.surat_izin_usaha.index', [
            'surat_izin_usaha' => SuratIzinUsaha::all()
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
        return view('dashboard.layanan.surat_izin_usaha.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request )
    {
        $validatedData = $request->validate([
            'nama_pengaju' => 'required|max:255',
            'nama_usaha' => 'required|max:255',
            'jenis_usaha' => 'required|max:255',
            'image1' => 'image|file|max:1024',
            'image2' => 'image|file|max:1024'
        ]);
        SuratIzinUsaha::create($validatedData);
        if($request->file('image1')){
            $validatedData['image1'] = $request->file('image1')->store('layanan-images1');
        }
        if($request->file('image2')){
            $validatedData['image2'] = $request->file('image2')->store('layanan-images2');
        }


        return redirect('/dashboard/surat_izin_usaha')->with('success','Pengajuan Suarat Izin Usaha Succes!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(SuratIzinUsaha $surat_izin_usaha)
    {
        return view('dashboard.layanan.surat_izin_usaha.show', [
            'usaha'=>$surat_izin_usaha
        ]);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(SuratIzinUsaha $surat_izin_usaha)
    {
        return view('dashboard.layanan.surat_izin_usaha.edit', [
            'usaha'=>$surat_izin_usaha
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SuratIzinUsaha $surat_izin_usaha)
    {
        $rules = [
            'nama_pengaju' => 'required|max:255',
            'nama_usaha' => 'required|max:255',
            'jenis_usaha' => 'required|max:255',
            'image1' => 'image|file|max:1024',
            'image2' => 'image|file|max:1024'
        ];


        $validatedData = $request->validate($rules);

        if($request->file('image1')){
            if($request->oldImage){
                        Storage::delete($request->oldImage);
                    }
            $validatedData['image1'] = $request->file('image1')->store('layanan-images1');
        }
        if($request->file('image2')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validatedData['image2'] = $request->file('image2')->store('layanan-images2');
        }

        SuratIzinUsaha::where('id', $surat_izin_usaha->id)
        ->update($validatedData);

        return redirect('/dashboard/surat_izin_usaha')->with('success','Suarat Izin Usaha Berhasih di Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SuratIzinUsaha $surat_izin_usaha)
    {
        if($surat_izin_usaha->image1){
            Storage::delete($surat_izin_usaha->image1);
        }
        if($surat_izin_usaha->image2){
            Storage::delete($surat_izin_usaha->image2);
        }
        SuratIzinUsaha::destroy($surat_izin_usaha->id);
        return redirect('/dashboard/surat_izin_usaha')->with('success', 'Surat has been added!');
    }
}
