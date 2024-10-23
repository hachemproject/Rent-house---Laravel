<?php

namespace App\Http\Controllers;

use App\Models\user;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules;

use Spatie\Permission\Models\Role;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
class ControlUsers extends Controller
{
    /**
     * Display a listing of the resource.
     */
    function __construct()
    {
        $this->middleware(['permission:user-list|user-create|user-edit|user-delete'], ['only' => ['index', 'show']]);
        $this->middleware(['permission:user-create'], ['only' => ['create', 'store']]);
        $this->middleware(['permission:user-edit'], ['only' => ['edit', 'update']]);
        $this->middleware(['permission:user-delete'], ['only' => ['destroy']]);
    }
    public function index()
    {

        $donnees = user::all(); 

        return view('dashbord\user\index', compact('donnees'));



    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user= User::all();
        $roles = Role::pluck('name','name')->all();
        return view('dashbord\user\create',compact('user','roles'));
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'prenom' => 'required',
            'email' => 'required|email',
            'password' => ['required', 'confirmed', Password::defaults()],
            'roles' => 'required'
        ]);
    
        $user = User::create([
            'name' => $request->name,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $user->assignRole($request->roles);
        return redirect()->route('user.index')->with('success', 'Data saved successfully!');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(user $users)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(user $user)
    {
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();
        return view('dashbord.user.edit',compact('user','roles','userRole'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, user $user)
    {
        $user->removeRole($user->roles->first());
        $user->assignRole($request->roles);
        $user->update($request->all());
        return redirect()->route('user.index')->with('success', 'Data saved successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(user $user)
    {
        //return $user->name; 
        $user->delete();
        return redirect()->route('user.index');
    }
}
