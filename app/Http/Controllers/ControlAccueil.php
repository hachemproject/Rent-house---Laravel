<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use App\Models\homes;
use App\Models\categorys;
use App\Models\reservations;
use App\Models\images;
use Carbon\Carbon;

use Illuminate\Http\Request;

class ControlAccueil extends Controller
{
    /**
     * Display a listing of the resource.
     */


     public function affichHome()
     {        
        $categorys= categorys::all(); 
        $homes = homes::all(); 
        
     
         $categoryIds = $homes->pluck('category_id'); 
         $categories = categorys::whereIn('id', $categoryIds)->get()->keyBy('id'); 
     
         // Prépare les données pour le retour JSON
         $homeData = $homes->map(function ($home) use ($categories) {
         $image = images::where('home_id', $home->id)->first(); 

             return [  
                 'id' => $home->id,
                 'nb_place' => $home->nb_place,
                 'adresse' => $home->adresse,
                 'bath' => $home->bath,
                 'num_tel' => $home->num_tel,
                 'description' => $home->description,
                 'ville' => $home->ville,
                 'prix' => $home->prix,
                 'created_at' => $home->created_at,
                 'updated_at' => $home->updated_at,
                 'category_id' => $home->category_id,
                 'category_name' => $categories[$home->category_id]->nom ?? null, 
                 'image' => $image ? $image->photos : null, 
                          
];
         });
         return view('client\accueil', compact('homeData','categorys'));

         return response()->json($homeData);
     }
     
/*
    public function affichHome()
    {
        $detail= homes::all(); 
        $categorys= categorys::all(); 

        return view('client\accueil', compact('detail','categorys'));
    }
*/
    public function affichdetail(Request $request)
    {
        $detail = homes::where('id', $request->id)->first();
        $image = images::where('home_id', $request->id)->get();
        $categorys = categorys::all();

        return view('client\details', compact('detail', 'categorys','image'));
    }

    

    public function reserver(Request $request)
    {
       
        $reservations = reservations::where('home_id', $request->id)->get();

        foreach ($reservations as $reservation) {
            if (
                ($request->date_deb >= $reservation->date_deb && $request->date_deb <= $reservation->date_fin) ||
                ($request->date_fin >= $reservation->date_deb && $request->date_fin <= $reservation->date_fin) ||
                ($request->date_deb <= $reservation->date_deb && $request->date_fin >= $reservation->date_fin)
            ) {
                // si déjà réservée
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




    public function reservationClient()
    {
        $categorys = categorys::all();

        $userId = Auth::id();
        $details = reservations::where('user_id', $userId)->get();
       $homeIds = $details->pluck('home_id');

         $homes = homes::whereIn('id', $homeIds)->get()->keyBy('id');
        $categoryIds = $homes->pluck('category_id');
        $categories = categorys::whereIn('id', $categoryIds)->get()->keyBy('id');

        $details = $details->map(function ($detail) use ($homes, $categories) {
            $home = $homes->get($detail->home_id); 
            $detail->home = $home;
            $canCancel = Carbon::now()->diffInHours($detail->created_at) < 24;
            $dateDeb = Carbon::parse($detail->date_deb);
            $dateDemain = Carbon::tomorrow();
    
            $detail->canCancel = $canCancel && !$dateDeb->isSameDay($dateDemain);
                        if ($home && $home->category_id) {
                $detail->home->category = $categories->get($home->category_id);
            }
            
            return $detail;
        });

        return view('client.reservationClient', compact('details','categorys'));
        return response()->json($details);
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
