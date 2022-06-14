<?php

namespace App\Http\Controllers;

use App\Models\Religion;
use Illuminate\Http\Request;

class DashboardReligionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $religion = Religion::all();
        $total = Religion::sum('jumlah');
        $data = Religion::pluck('agama');
        $jumlah_data = Religion::pluck('jumlah');
        return view('dashboard.data.religions.index', compact('religion','total', 'data', 'jumlah_data'));

        // return view('dashboard.data.religions.index', [
        //     '' => Religion::all()
        //     // 'posts' => Post::where('user_id', auth()->user()->id)->get()
        // ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.data.religions.create');
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
            'agama' => 'required|unique:religions',
            'jumlah' => 'required|max:255'
        ]);

        Religion::create($validatedData);

        return redirect('/dashboard/data/religions')->with('success', 'New Religion has been added!');
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
    public function edit(Religion $religion)
    {
        return view('dashboard.data.religions.edit', [
            'religion' => $religion
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Religion $religion)
    {
        $rules = [
            'jumlah' => 'required|max:255'
        ];
        if ($request->agama != $religion->agama) {
            $rules['agama'] = 'required|unique:religions';
        }

        $validatedData = $request->validate($rules);

        Religion::where('id', $religion->id)
            ->update($validatedData);

        return redirect('/dashboard/data/religions')->with('success', 'Religion has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Religion $religion)
    {
        Religion::destroy($religion->id);
        return redirect('/dashboard/data/religions')->with('success', 'Religion has been added!');
    }
}
