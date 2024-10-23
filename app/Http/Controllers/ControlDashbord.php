<?php

namespace App\Http\Controllers;
use App\Models\homes;
use App\Models\User;
use App\Models\messages;
use App\Models\reservations;
use Spatie\Permission\Models\Role;


use Carbon\Carbon;



use Illuminate\Http\Request;

class ControlDashbord extends Controller
{
    /**
     * Display a listing of the resource.
     */



     function __construct()
     {
         $this->middleware(['permission:dashboard-list|dashboard-create|dashboard-edit|dashboard-delete'], ['only' => ['index', 'show']]);
         $this->middleware(['permission:dashboard-create'], ['only' => ['create', 'store']]);
         $this->middleware(['permission:dashboard-edit'], ['only' => ['edit', 'update']]);
         $this->middleware(['permission:dashboard-delete'], ['only' => ['destroy']]);
     }


     public function index()
     {  


        $reservations = Reservations::selectRaw('YEAR(created_at) as year, MONTH(created_at) as month, COUNT(*) as count')
        ->groupBy('year', 'month')
        ->orderBy('year', 'asc') 
        ->orderBy('month', 'asc') 
        ->get();


        $messages = messages::where('is_active', 0)->get();
        foreach ($messages as $message) {
            $message->days_since_created = Carbon::parse($message->created_at)->diffInDays(Carbon::now());
        }
        $homesCount = homes::count();
        $reservationsCount = reservations::count();
        $usersCount = User::count();


        $user = User::with('roles')->limit(3)->get();
        $roles = Role::where('name', '!=', 'Client')->get();
         return view('dashbord\dashbord', compact('reservations','homesCount','usersCount','reservationsCount','messages','roles','user'));

     }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
