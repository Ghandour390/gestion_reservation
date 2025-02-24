@extends('main')

@section('content')
<div class="container">
    <h1 class="my-4 text-center">Liste des Salles</h1>

    <button type="button" class="btn btn-success mb-4" data-bs-toggle="modal" data-bs-target="#salleModal">
        Ajouter une Salle
    </button>

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
                        {{-- <input type="hidden" name="user_id" value="1">
                        <input type="hidden" name="status" value="panding"> --}}

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('salles.edit', $salle->id) }}" class="btn btn-warning">Modifier</a>
                            <form action="{{ route('salles.destroy', $salle->id) }}" method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer cette salle ?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Supprimer</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="modal fade" id="salleModal" tabindex="-1" aria-labelledby="salleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="salleModalLabel">Ajouter une Nouvelle Salle</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                </div>
                <form method="POST" action="{{ route('salles.store') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="numero" class="form-label">Numéro de Salle</label>
                            <input type="number" class="form-control" id="numero" name="Numero" required>
                        </div>
                        <div class="mb-3">
                            <label for="capacite" class="form-label">Capacité</label>
                            <input type="number" class="form-control" id="capacite" name="capacitie" required>
                        </div>
                        <div class="mb-3">
                            <label for="type" class="form-label">Type de Salle</label>
                            <select class="form-select" id="type" name="type" required>
                                <option value="reunion">Réunion</option>
                                <option value="chambre">Chambre</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="capacite" class="form-label">Image</label>
                            <input type="text" class="form-control" id="capacite" name="image" >
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                        <input type="submit" class="btn btn-primary" name="image" value="Enregistrer">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
