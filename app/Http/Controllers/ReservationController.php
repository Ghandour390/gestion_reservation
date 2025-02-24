<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Salle;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        $salles = Salle::all();
        return view('reservation.index', compact('salles'));
    }

    public function create()
    {
        return view('reservation.create');
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'Numero' => 'required|integer',
        //     'capacitie' => 'required|integer',
        //     'type' => 'required|string',
        //     'image' => 'required|string'
        // ]);

        // var_dump($request['image']);
        // die();
        
        Reservation::create([
            'user_id' => $request->user_id,
            'salle_id' => $request->salle_id, 
            'date_dubee' => $request->date_dubee,
            'date_finall' => $request->date_finall,
            'status' => $request ->status
        ]);

        return redirect()->route('salles.index')->with('success', 'reservation créée avec succès.');
    }

    public function show(Reservation $reservation)
    {
        return view('reservation.show', compact('reservation'));
    }

    public function edit(Reservation $reservation)
    {
        return view('reservation.edit', compact('reservation'));
    }

    public function update(Request $request, Reservation  $reservation)
    {

        $data = $request->only(['user_id', 'salle_id', 'date-dubee', 'date_finall','status']);
        $reservation->update($data);

        return redirect()->route('reservation.index')->with('success', 'Reservation mise à jour avec succès.');
    }

    public function destroy(Reservation $reservation)
    {
        $reservation->delete();

        return redirect()->route('reservation.index')->with('success', 'Reservation supprimée avec succès.');
    }
}

