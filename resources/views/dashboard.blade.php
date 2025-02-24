@extends('main')

@section('content')

<div class="card">
	<div class="card-header">Dashboard</div>
	<div class="card-body">
		
		systeme de reservation
	</div>
</div>
@section('content')
    <h1>Liste des Salles</h1>
    <a href="{{ route('salles.create') }}">Créer une nouvelle salle</a>
    <ul>
        @foreach ($salles as $salle)
            <li>{{ $salle->Numero }} (Capacité: {{ $salle->capacite }})</li>
        @endforeach
    </ul>
@endsection

@endsection('content')