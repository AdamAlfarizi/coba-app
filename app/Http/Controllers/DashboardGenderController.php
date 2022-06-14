<?php

namespace App\Http\Controllers;

use App\Models\Gender;
use Illuminate\Http\Request;

class DashboardGenderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gender = Gender::all();
        $total = Gender::sum('jumlah');
        $data = Gender::pluck('jenis');
        $jumlah_data = Gender::pluck('jumlah');
        return view('dashboard.data.genders.index', compact('gender','total', 'data', 'jumlah_data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.data.genders.create');
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
            'jenis' => 'required|unique:genders',
            'jumlah' => 'required|max:255'
        ]);

        Gender::create($validatedData);

        return redirect('/dashboard/data/genders')->with('success', 'New Data Gender has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Gender $gender)
    {
        return view('dashboard.data.genders.edit', [
            'gender' => $gender
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gender $gender)
    {
        $rules = [
            'jumlah' => 'required|max:255'
        ];
        if ($request->jenis != $gender->jenis) {
            $rules['jenis'] = 'required|unique:genders';
        }

        $validatedData = $request->validate($rules);

        Gender::where('id', $gender->id)
            ->update($validatedData);

        return redirect('/dashboard/data/genders')->with('success', 'Gender has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gender $gender)
    {
        Gender::destroy($gender->id);
        return redirect('/dashboard/data/genders')->with('success', 'Gender has been added!');
    }
}
