<?php

namespace App\Http\Controllers;

use App\Models\images;
use App\Models\homes;
use Illuminate\Http\Request;

class ControlImages extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(request $request)
    {
        $IdHome=$request->id;
        $detail = images::where('home_id', $IdHome)->get();
        return view('dashbord\images\index',compact('detail', 'IdHome'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(request $request)
    {
        $IdHome=$request->id;
        return view ('dashbord.images.create',compact('IdHome'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $IdHome=$request->id;
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);  
        $imageName = time().'.'.$request->image->extension();  
           
        $request->image->move(public_path('images'), $imageName);
        
        images::create([
            'photos' => $imageName,
            'home_id' => $IdHome,
        ]);

        return redirect()->route('indexe.image', ['id' => $IdHome])->with('success', 'Data saved successfully!');

    
    }


    /**
     * Display the specified resource.
     */
    public function show(images $images)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(images $images)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, images $images)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
{ 
    
    $image = Images::findOrFail($request->id);
    $image->delete();

    return redirect()->back();
}
}
