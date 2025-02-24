@extends('main')

@section('title', 'Modifier la Salle')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Modifier la Salle</h2>

    <form action="{{ route('salles.update', $salle->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="numero" class="form-label">Numéro de Salle</label>
            <input type="text" class="form-control" id="numero" name="numero" value="{{ $salle->numero }}" required>
        </div>

        <div class="mb-3">
            <label for="capacitie" class="form-label">Capacitié</label>
            <input type="number" class="form-control" id="capacitie" name="capacitie" value="{{ $salle->capacite }}" required>
        </div>

        <div class="mb-3">
            <label for="type" class="form-label">Type de Salle</label>
            <select class="form-control" id="type" name="type" required>
                <option value="reunion" {{ $salle->type == 'reunion' ? 'selected' : '' }}>Réunion</option>
                <option value="chambre" {{ $salle->type == 'chambre' ? 'selected' : '' }}>Chambre</option>
            </select>
        </div>
        
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="text" class="form-control" id="capacite" name="image" >
        </div>
    

        <button type="submit" class="btn btn-primary">Mettre à jour</button>
        <a href="{{ route('salles.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection
