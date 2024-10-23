<?php

namespace App\Http\Controllers;

use App\Models\homes;
use App\Models\images;
use App\Models\categorys;
use Illuminate\Http\Request;

class ControlHomes extends Controller
{
    function __construct()
    {
        $this->middleware(['permission:home-list|home-create|home-edit|home-delete'], ['only' => ['index', 'show']]);
        $this->middleware(['permission:home-create'], ['only' => ['create', 'store']]);
        $this->middleware(['permission:home-edit'], ['only' => ['edit', 'update']]);
        $this->middleware(['permission:home-delete'], ['only' => ['destroy']]);
    }
   /* public function sarchbyid(Request $request)
    {
         return $request->id;

        $donn= homes::all(); 

        return view('dashbord\home\index', compact('donn'));
    }
*/
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $donn= homes::all(); 
        return view('dashbord\home\index', compact('donn'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories= categorys::all();
        return view ('dashbord.home.create',compact('categories'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nb_place' => 'required',
            'adresse' => 'required',
            'ville' => 'required',
            'bath' => 'required',
            'num_tel' => 'required',
            'description' => 'required',
            'prix' => 'required',
            'category_id' => 'required',
        ]);

        homes::create($request->all());
        return redirect()->route('home.index')->with('success', 'Data saved successfully!');
    }


    /**
     * Display the specified resource.
     */
    public function show(homes $homes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
{
    $home = homes::find($id);
    $categories = categorys::all();
    $selectedCategory = $home->category_id; 
    return view('dashbord.home.edit', compact('home', 'categories', 'selectedCategory'));
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, homes $home)
    {
        
        $home->update($request->all());
        return redirect()->route('home.index')->with('success', 'Data saved successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(homes $home)
    {
        $home->delete();
        return redirect()->route('home.index');
    }
}
