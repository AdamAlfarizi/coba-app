<?php

namespace App\Http\Controllers;

use App\Models\Village;
use App\Models\Potential;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardVillageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.villages.index', [
            'village' => Village::all()
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
        return view('dashboard.villages.create',[
            'potential' => Potential::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'potential_id' => 'required',
            'title' => 'required|max:255',
            'slug' => 'required|unique:villages',
            'image' => 'image|file|max:1024',
            'body' => 'required'
        ]);

        if($request->file('image')){
            $validatedData['image'] = $request->file('image')->store('village-images');
        }

        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);

        Village::create($validatedData);

        return redirect('/dashboard/villages')->with('success','New Village potential has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Village  $village
     * @return \Illuminate\Http\Response
     */
    public function show(Village $village)
    {
        //return $village;
         return view('dashboard.villages.show', [
            'village'=>$village
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Village  $village
     * @return \Illuminate\Http\Response
     */
    public function edit(Village $village)
    {
        //
        return view('dashboard.villages.edit',[
            'village'=>$village,
            'potential' => Potential::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Village  $village
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Village $village)
    {
        //
        $rules = [
            'potential_id' => 'required',
            'title' => 'required|max:255',
            'image' => 'image|file|max:1024',
            'body' => 'required'
        ];

        if($request->slug != $village->slug){
            $rules['slug']='required|unique:villages';
        }

        $validatedData = $request->validate($rules);

        if($request->file('image')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('village-images');
        }

        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);

        Village::where('id', $village->id)
        ->update($validatedData);

        return redirect('/dashboard/villages')->with('success','Village potential has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Village  $village
     * @return \Illuminate\Http\Response
     */
    public function destroy(Village $village)
    {
        //
        if($village->image){
            Storage::delete($village->image);
        }
        Village::destroy($village->id);

        return redirect('/dashboard/villages')->with('success','Village potential has been added!');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Village::class, 'slug', $request->title);
        return response()->json(['slug'=>$slug]);

    }
}
