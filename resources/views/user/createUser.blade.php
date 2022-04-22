@extends('layouts.app')
@section('title')
    Crea Usuari
@endsection
@section('contingut')
    <form action="/save-user" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" class="form-control" id="nom" name="nom" value="{{old('nom')}}">
            @error('nom')
            <h6 class="alert alert-danger">{{$message}}</h6>
            @enderror
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{old('email')}}">
            @error('email')
            <h6 class="alert alert-danger">{{$message}}</h6>
            @enderror
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Password</label>
            <input type="password" name="password" id="password" class="form-control" value="{{old('password')}}">
            @error('password')
            <h6 class="alert alert-danger">{{$message}}</h6>
            @enderror
        </div>
        <div class="mb-3">
            <label for="bornDate" class="form-label">Data de Naixement</label>
            <input type="date" name="bornDate" id="bornDate" class="form-control" value="{{old('bornDate')}}">
            @error('bornDate')
            <h6 class="alert alert-danger">{{$message}}</h6>
            @enderror
        </div>

        <input type="submit" class="btn btn-success mt-3" value="Crea">
    </form>
@endsection

