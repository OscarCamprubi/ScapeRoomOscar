@extends('layouts.app')
@section('title')
    Edita Rol
@endsection
@section('contingut')
    <form action="/update-rol" method="POST">
        @csrf
        <input type="hidden" value="{{$rol->id}}" name="id">
        <div class="mb-3">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" class="form-control" id="nom" name="nom" value="{{old('nom',$rol->nom)}}">
            @error('nom')
            <h6 class="alert alert-danger">{{$message}}</h6>
            @enderror
        </div>
        <input type="submit" class="btn btn-success mt-3" value="Edita">
    </form>
@endsection
