@extends('layouts.base')

@section('content')
    <h1>{{ $plate->name }}</h1>

    
    <h2>{{$plate->name}}</h2>
    <p>Prezzo: {{ $plate->price }}€</p>
    <p>Prezzo: {{ $plate->available == 0 ? 'Non disponibile' : 'Disponibile' }}</p>

            
      
@endsection