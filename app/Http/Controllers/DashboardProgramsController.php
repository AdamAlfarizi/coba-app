<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;

class DashboardProgramsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Program $program)
    {
        return view('dashboard.programs.programs', [
            'title' => 'Post Categories',
            "assistances" => $program->assistances,
            'programs' => Program::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.programs.create');
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
            'name' => 'required|unique:programs',
            'asal' => 'required|max:255',
            'jumlah' => 'required|max:255',
            'sasaran' => 'required|max:255',
            'status' => 'required|max:255'
        ]);

        Program::create($validatedData);

        return redirect('/dashboard/programs')->with('success', 'New Program has been added!');
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
    public function edit(Program $program)
    {
        return view('dashboard.programs.edit', [
            'program' => $program
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Program $program)
    {
        $rules = [
            'asal' => 'required|max:255',
            'jumlah' => 'required|max:255',
            'sasaran' => 'required|max:255',
            'status' => 'required|max:255'
        ];
        if ($request->name != $program->name) {
            $rules['name'] = 'required|unique:programs';
        }

        $validatedData = $request->validate($rules);

        Program::where('id', $program->id)
            ->update($validatedData);

        return redirect('/dashboard/programs')->with('success', 'Program has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Program $program)
    {
        Program::destroy($program->id);
        return redirect('/dashboard/programs')->with('success', 'Program has been added!');
    }

   
}
