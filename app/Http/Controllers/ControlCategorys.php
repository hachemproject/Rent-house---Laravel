<?php

namespace App\Http\Controllers;

use App\Models\categorys;
use Illuminate\Http\Request;

class ControlCategorys extends Controller
{
    function __construct()
    {
        $this->middleware(['permission:categorie-list|categorie-create|categorie-edit|categorie-delete'], ['only' => ['index', 'show']]);
        $this->middleware(['permission:categorie-create'], ['only' => ['create', 'store']]);
        $this->middleware(['permission:categorie-edit'], ['only' => ['edit', 'update']]);
        $this->middleware(['permission:categorie-delete'], ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $donnees = categorys::all(); 

        return view('dashbord\categorys\index', compact('donnees'));


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashbord\categorys\create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom'=>'required',
            

        ]);
        categorys::create($request->all());
        return redirect()->route('categorys.index')->with('success', 'Data saved successfully!');
    



    }

    /**
     * Display the specified resource.
     */
    public function show(categorys $categorys)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(categorys $category)
    {

        return view('dashbord.categorys.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, categorys $category)
    {

        $category->update($request->all());
        return redirect()->route('categorys.index')->with('success', 'Data saved successfully!');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(categorys $category)
    {
        $category->delete();
        return redirect()->route('categorys.index');
    }
    
}
