@extends('layouts.base')

@section('content')
    <h1>{{ $user->restaurant }}</h1>
    


    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Nome Piatto</th>
                <th scope="col">Prezzo</th>
                <th scope="col">Disponibilità</th>
                <th scope="col">Azioni</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                @foreach ($user->plates as $plate)
                <td>{{$plate->name}}</td>
                <td>Prezzo: {{ $plate->price }}€</td>
                <td>Disponibilità: {{ $plate->available == 0 ? 'Non disponibile' : 'Disponibile' }}</td>
                <td><a href="{{ route('users.show', $plate->id)}}">Mostra</a></td>
                </tr>
                @endforeach
        </tbody>
      </table>
      
@endsection