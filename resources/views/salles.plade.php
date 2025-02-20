@extends('layouts.app')

@section('content')
    <h1>Liste des Salles</h1>
    <a href="{{ route('salles') }}">Créer une nouvelle salle</a>
    <ul>
        @foreach ($salles as $salle)
            <li>{{ $salle->numero }} (Capacité: {{ $salle->capacite }})</li>
            <li>{{$salle->type</li>
        @endforeach
    </ul>
@endsection
