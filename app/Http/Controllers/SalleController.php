<?php

namespace App\Http\Controllers;

use App\Models\Salle;
use Illuminate\Http\Request;

class SalleController extends Controller
{
        public function index()
        {
            $salles = Salle::all();
            return view('salles', compact('salles'));
        }
    
        public function createSalle()
        {
            return view('salles.create');
        }
    
        public function store(Request $request)
        {
            $request->validate([
                'Numero' => 'required|integer',
                'capacite' => 'required|integer',
                'type' => 'require'
            ]);
    
            Salle::create($request->all());
    
            return back()->with('success', 'Salle créée avec succès.');
        }
    
        public function show(Salle $salle)
        {
            return view('salles.show', compact('salle'));
        }
    
        public function edit(Salle $salle)
        {
            return view('salles.edit', compact('salle'));
        }
    
        public function update(Request $request, Salle $salle)
        {
            $request->validate([
                'Numero' => 'required',
                'capacite' => 'required|integer',
                'type' => 'require'
            ]);
    
            $salle->update($request->all());
    
            return redirect()->route('salles')
                             ->with('success', 'Salle mise à jour avec succès.');
        }
    
        public function destroy(Salle $salle)
        {
            $salle->delete();
    
            return redirect()->route('salles')
                             ->with('success', 'Salle supprimée avec succès.');
        }
    }
    

