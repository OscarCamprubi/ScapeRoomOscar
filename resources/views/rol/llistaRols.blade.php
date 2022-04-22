@extends('layouts.app')
@section('title')
    Llista de Rols
@endsection
@section('contingut')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Nom</th>
            <th scope="col">Accions</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($rols as $rol){
        ?>
        <tr>
            <td>{{$rol->nom}}</td>
            <td>
                <a href="/edit-rol/{{$rol->id}}" class="btn btn-primary">Edita</a>
                <a href="/delete-rol/{{$rol->id}}" class="btn btn-danger">Elimina</a>
            </td>
        </tr>
        <?php
        } ?>
        </tbody>
    </table>
@endsection

