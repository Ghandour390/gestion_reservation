@extends('main')

@section('content')
<div class="container">
    <h1 class="my-4 text-center">Réservation de Salle</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="row">
        @foreach ($salles as $salle)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{$salle->image}}" class="card-img-top" alt="Image de la salle" style="height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title">Salle {{ $salle->Numero }}</h5>
                        <p class="card-text">
                            <strong>Capacité :</strong> {{ $salle->capacitie }} personnes<br>
                            <strong>Type :</strong> {{ ucfirst($salle->type) }}
                        </p>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#reservationModal{{$salle->id}}">
                            Réserver
                        </button>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="reservationModal{{$salle->id}}" tabindex="-1" aria-labelledby="reservationModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="reservationModalLabel">Réserver la Salle {{ $salle->Numero }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                        </div>
                        <form method="POST" action="{{ route('reservation.store') }}">
                            @csrf
                            <div class="modal-body">
                                <input type="hidden" name="salle_id" value="{{$salle->id}}">
                                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                <div class="mb-3">
                                    <label for="date_dubee" class="form-label">Date de Début</label>
                                    <input type="date" class="form-control" id="date_dubee" name="date_dubee" required>
                                </div>
                                <div class="mb-3">
                                    <label for="date_finall" class="form-label">Date de Fin</label>
                                    <input type="date" class="form-control" id="date_finall" name="date_finall" required>
                                </div>
                                <div class="mb-3">
                                    <label for="status" class="form-label">Statut</label>
                                    <select class="form-select" id="status" name="status" required>
                                        <option value="en attente">En attente</option>
                                        <option value="confirmée">Confirmée</option>
                                        <option value="annulée">Annulée</option>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                <button type="submit" class="btn btn-success">Confirmer la Réservation</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
