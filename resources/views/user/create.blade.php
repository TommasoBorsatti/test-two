@extends('layouts.base')


@section('content')


<form action="{{route('users.store')}}" method="POST">
	@csrf
	@method('POST')
	<div class="form-group">
		<label for="name">Nome</label>
		<input type="text" class="form-control" id="name" name="name" placeholder="Inserisci il nome del piatto">
	</div>
	<div class="form-group">
		<label for="price">Prezzo</label>
		<input type="number" step="0.01" class="form-control" id="price" name="price" placeholder="Inserisci il prezzo">
	</div>
	<div class="form-group">
		<label for="description">Contenuto</label>
		<textarea class="form-control"  name="description" id="description" cols="30" rows="10" placeholder="Descrizione"></textarea>
	</div>
	<div class="form-group">
		<label for="plate_img">Immagine</label>
		<input type="text" class="form-control" id="plate_img" name="plate_img" placeholder="url immagine">
	</div>
	<div class="form-check form-check-inline">
		<input class="form-check-input" type="checkbox" id="available" name="available">
		<label class="form-check-label" for="available">Disponibilità</label>
	</div>
	<div class="mt-3">
		<h3>Tags</h3>
		@foreach ($categories as $category)
			<div class="form-check">
				<input class="form-check-input" type="checkbox" value="{{$category->id}}" id="{{$category->name}}" name="categories[]">
				<label class="form-check-label" for="{{$category->name}}">
					{{$category->name}}
				</label>
			</div>
		@endforeach
	</div>
	<div class="mt-3">
		<button type="submit" class="btn btn-primary">Crea</button>
	</div>
</form>
	
@endsection

