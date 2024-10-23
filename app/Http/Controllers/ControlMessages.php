<?php

namespace App\Http\Controllers;
use App\Models\categorys;
use App\Models\messages;
use Illuminate\Http\Request;

class ControlMessages extends Controller
{
    /**
     * Display a listing of the resource.
     */

     function __construct()
     {
         $this->middleware(['permission:message-list|message-create|message-edit|message-delete'], ['only' => ['index', 'show']]);
         $this->middleware(['permission:message-create'], ['only' => ['create', 'store']]);
         $this->middleware(['permission:message-edit'], ['only' => ['edit', 'update']]);
         $this->middleware(['permission:message-delete'], ['only' => ['destroy']]);
     }
    public function index()
    {
        $donnees = messages::all(); 

        return view('dashbord\messages\index', compact('donnees'));

    }
    public function affichMessage()
    {

        $categorys= categorys::all(); 

        return view('client\message', compact('categorys'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('client\message');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'message'=>'required',
            'email'=>'required',
            'name'=>'required',
            'subject'=>'required',

        ]);
        messages::create([
            'message' => $request->message,
            'email' => $request->email,
            'name' => $request->name,
            'subject' => $request->subject,
            'is_active' => 0, 
        ]);
        return redirect()->back()->with('message', 'Messge envoyée avec succès!');
    }

    /**
     * Display the specified resource.
     */ //   public function show(messages $messages)

    public function show(Request $request)
    {
        $message = messages::where('id', $request->id)->first();

        $message->update([
            'is_active' => 1,
        ]);
        return view('dashbord\messages\message',compact('message'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(messages $messages)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, messages $messages)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(messages $messages)
    {
        //
    }
}
