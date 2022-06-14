<?php

namespace App\Http\Controllers;

use App\Models\Profession;
use Illuminate\Http\Request;

class DashboardProfessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profession = Profession::all();
        $total = Profession::sum('jumlah');
        $data = Profession::pluck('kelompok');
        $jumlah_data = Profession::pluck('jumlah');
        return view('dashboard.data.professions.index', compact('profession','total', 'data', 'jumlah_data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.data.professions.create');
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
            'kelompok' => 'required|unique:professions',
            'jumlah' => 'required|max:255'
        ]);

        Profession::create($validatedData);

        return redirect('/dashboard/data/professions')->with('success', 'New Data Profession has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profession  $profession
     * @return \Illuminate\Http\Response
     */
    public function show(Profession $profession)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profession  $profession
     * @return \Illuminate\Http\Response
     */
    public function edit(Profession $profession)
    {
        return view('dashboard.data.professions.edit', [
            'profession' => $profession
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profession  $profession
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profession $profession)
    {
        $rules = [
            'jumlah' => 'required|max:255'
        ];
        if ($request->kelompok != $profession->kelompok) {
            $rules['kelompok'] = 'required|unique:professions';
        }

        $validatedData = $request->validate($rules);

        Profession::where('id', $profession->id)
            ->update($validatedData);

        return redirect('/dashboard/data/professions')->with('success', 'Profession has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profession  $profession
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profession $profession)
    {
        Profession::destroy($profession->id);
        return redirect('/dashboard/data/professions')->with('success', 'Profession has been added!');
    }
}
