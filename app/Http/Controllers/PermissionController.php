<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{

    function __construct()
    {
        $this->middleware(['permission:role-list|role-create|role-edit|role-delete'], ['only' => ['index', 'store']]);
        $this->middleware(['permission:role-create'], ['only' => ['create', 'store']]);
        $this->middleware(['permission:role-edit'], ['only' => ['edit', 'update']]);
        $this->middleware(['permission:role-delete'], ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $permission=permission::all();
        return view('dashboard.admin.permissions.index',compact('permission'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.admin.permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        permission::create($request->all());
        return redirect()->route('permission.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(permission $permission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(permission $permission)
    {
        return view('dashboard.admin.permissions.edit',compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, permission $permission)
    {
        $permission->update($request->all());
        return redirect()->route('permission.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(permission $permission)
    {
        $permission->delete();
        return redirect()->route('permission.index');
    }
}
