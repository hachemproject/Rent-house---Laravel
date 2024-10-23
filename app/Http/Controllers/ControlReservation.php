<?php

namespace App\Http\Controllers;

use App\Models\reservations;
use App\Models\user;
use App\Models\homes;
use Illuminate\Http\Request;

class ControlReservation extends Controller
{
    /**
     * Display a listing of the resource.
     */
    function __construct()
    {
        $this->middleware(['permission:reservation-list|reservation-create|reservation-edit|reservation-delete'], ['only' => ['index', 'show']]);
        $this->middleware(['permission:reservation-create'], ['only' => ['create', 'store']]);
        $this->middleware(['permission:reservation-edit'], ['only' => ['edit', 'update']]);
        $this->middleware(['permission:reservation-delete'], ['only' => ['destroy']]);
    }
    public function index()
    {
        $donnees= reservations::all(); 

        return view('dashbord\reservations\index', compact('donnees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         $users = user::all(); 
         $home= homes::all(); 

          return view('dashbord\reservations\create',compact('users','home'));
    }

    public function store(Request $request)
    {

        
        $reservations = reservations::where('home_id', $request->id)->get();

        //$detail = reservations::where('home_id', $request->id)->first();
        //return $detail;
        foreach ($reservations as $reservation) {
            if (
                ($request->date_deb >= $reservation->date_deb && $request->date_deb <= $reservation->date_fin) ||
                ($request->date_fin >= $reservation->date_deb && $request->date_fin <= $reservation->date_fin) ||
                ($request->date_deb <= $reservation->date_deb && $request->date_fin >= $reservation->date_fin)
            ) {
                // Si deja
                return redirect()->back()->with('error', 'Cette période est déjà réservée!');
            }
        } reservations::create([
            'home_id' => $request->id,
            'date_deb' => $request->date_deb,
            'date_fin' => $request->date_fin,
            'user_id' => auth()->id(), 
        ]);
    
        return redirect()->back()->with('success', 'Réservation effectuée avec succès!');
    }




    /**
     * Store a newly created resource in storage.
     */
    

    /**
     * Display the specified resource.
     */
    public function show(reservations $reservations)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */

     public function edit($id)
     {
        
         $reservation = reservations::find($id); 
         $users = user::all();
         $homes = homes::all();
         $selectedUserId = $reservation->user_id; 
         $selectedHomeId = $reservation->home_id; 
     
         return view('dashbord.reservations.edit', compact('reservation','users', 'homes', 'selectedUserId', 'selectedHomeId'));
     }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, reservations $reservation)
    {
        $reservation->update($request->all());
        return redirect()->route('reservations.index')->with('success', 'Data saved successfully!');  
      }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(reservations $reservation)
    {
        //return $user->name; 
        $reservation->delete();
        return redirect()->back();
        }
}
