@extends('layouts.app')
@section('title')
    @empty($user)
        Not found
    @endempty
    @isset($user)
        {{$user->name}}
    @endisset
@endsection
@section('contingut')
    @empty($user)
        <h1 class="text-center">Not found</h1>
    @endempty
    @isset($user)
        <div class="card mt-5">
            <div class="card-header">
                <h5 class="card-title m-3">{{$user->name}}</h5>
            </div>
            <div class="card-body">
                <h6 class="card-text">Email: {{$user->email}}</h6>
                <p class="card-text">Data de Naixement: {{$user->bornDate}}</p>
            </div>
            <div class="card-footer p-4">
                <a class="btn btn-primary me-3" href="/edit-user/{{$user->id}}">Edita</a>
                <a class="btn btn-danger" href="/delete-user/{{$user->id}}">Elimina</a>
            </div>
        </div>
    @endisset
@endsection
