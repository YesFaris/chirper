<?php

namespace App\Http\Controllers;

use App\Models\Chirp;
use App\Http\Controllers\Controller;
use App\Notifications\NewChirp;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ChirpController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $action = action([ChirpController::class, 'index']);

        return view("chirps.index", ['chirps' => Chirp::orderBy('created_at', 'DESC')->get()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request):RedirectResponse
    {
        //
        $validated = $request->validate([
            'message' => 'required|string|max:255',
        ]);
        
        //envoi des données au BDD
        $request->user()->chirps()->create($validated);
        
        //rediriger sur chirps.index
        return redirect(route('chirps.index'));
        
        // dd($validated);
        // dd($request->user());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Chirp $chirp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chirp $chirp)
    {
        return view('chirps.edit', ['chirp' => $chirp]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Chirp $chirp)
    {
        $this->authorize('update', $chirp);
        $validated = $request->validate([
            'message' => 'required|string|max:225',
        ]);
        $chirp->update($validated);
        
        return redirect(route('chirps.index'));
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chirp $chirp)
    {
        // vérifier l'autorisation du user
        $this->authorize('delete', $chirp);
        //suupprimer la ressource
        $chirp->delete();
        // rediriger vers la page des commentaires
        return redirect(route('chirps.index'));
    }
}