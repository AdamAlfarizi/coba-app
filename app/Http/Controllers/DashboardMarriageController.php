<?php

namespace App\Http\Controllers;

use App\Models\Marriage;
use Illuminate\Http\Request;

class DashboardMarriageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $marriage = Marriage::all();
        $total = Marriage::pluck('jumlah');
        $data = Marriage::pluck('status');
        $jumlah_data = Marriage::pluck('jumlah');
        return view('dashboard.data.marriages.index', compact('marriage','total', 'data', 'jumlah_data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.data.marriages.create');
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
            'status' => 'required|unique:marriages',
            'jumlah' => 'required|max:255'
        ]);

        Marriage::create($validatedData);

        return redirect('/dashboard/data/marriages')->with('success', 'New Data Marriage has been added!');
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
    public function edit(Marriage $marriage)
    {
        return view('dashboard.data.marriages.edit', [
            'marriage' => $marriage
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Marriage $marriage)
    {
        $rules = [
            'jumlah' => 'required|max:255'
        ];
        if ($request->kelompok != $marriage->kelompok) {
            $rules['status'] = 'required|unique:marriage';
        }

        $validatedData = $request->validate($rules);

        Marriage::where('id', $marriage->id)
            ->update($validatedData);

        return redirect('/dashboard/data/marriages')->with('success', 'Marriage has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Marriage $marriage)
    {
        Marriage::destroy($marriage->id);
        return redirect('/dashboard/data/marriages')->with('success', 'Marriage has been added!');
    }
}
