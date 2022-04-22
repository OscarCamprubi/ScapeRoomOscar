@extends('layouts.app')
@section('title')
    Crea Joc
@endsection
@section('contingut')
    <form action="/save-joc" method="POST">
        @csrf
        <div class="mb-3">

            <label for="nom" class="form-label">Nom</label>
            <input type="text" class="form-control" id="nom" name="nom" value="{{old('nom')}}">
            @error('nom')
            <h6 class="alert alert-danger">{{$message}}</h6>
            @enderror
        </div>
        <div class="mb-3">
            <label for="descripcio" class="form-label">Descripció</label>
            <textarea class="form-control" id="descripcio" rows="3" name="descripcio">{{old('descripcio')}}</textarea>
            @error('descripcio')
            <h6 class="alert alert-danger">{{$message}}</h6>
            @enderror
        </div>
        <div class="row">
            <div class="col">
                <label class="form-label" for="minJugadors">Minim de Jugadors</label>
                <input class="form-control" type="number" id="minJugadors" name="minJugadors" value="{{old('minJugadors')}}">
                @error('minJugadors')
                <h6 class="alert alert-danger">{{$message}}</h6>
                @enderror
            </div>
            <div class="col">
                <label class="form-label" for="maxJugadors">Màxim de Jugadors</label>
                <input class="form-control" type="number" id="maxJugadors" name="maxJugadors" value="{{old('maxJugadors')}}">
                @error('maxJugadors')
                <h6 class="alert alert-danger">{{$message}}</h6>
                @enderror
            </div>
        </div>
        <input type="submit" class="btn btn-success mt-3" value="Crea">
    </form>
@endsection
