<?php

namespace App\Http\Controllers;

use App\Models\Education;
use Illuminate\Http\Request;

class DashboardEducationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $education = Education::all();
        $total = Education::sum('jumlah');
        $data = Education::pluck('pendidikan');
        $jumlah_data = Education::pluck('jumlah');

        return view('dashboard.data.educations.index', compact('education','total', 'data','jumlah_data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.data.educations.create');
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
            'pendidikan' => 'required|unique:education',
            'jumlah' => 'required|max:255'
        ]);

        Education::create($validatedData);

        return redirect('/dashboard/data/educations')->with('success', 'New Data Education has been added!');
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
    public function edit(Education $education)
    {
        return view('dashboard.data.educations.edit', [
            'education' => $education
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Education $education)
    {
        $rules = [
            'jumlah' => 'required|max:255'
        ];
        if ($request->pendidikan != $education->pendidikan) {
            $rules['pendidikan'] = 'required|unique:education';
        }

        $validatedData = $request->validate($rules);

        Education::where('id', $education->id)
            ->update($validatedData);

        return redirect('/dashboard/data/educations')->with('success', 'Education has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Education $education)
    {
        Education::destroy($education->id);
        return redirect('/dashboard/data/educations')->with('success', 'Education has been added!');
    }
}
