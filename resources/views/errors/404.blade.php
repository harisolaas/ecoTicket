@extends('master')

@section('title', '404')

@section('main')
    <div class="container">
        <h1>Error 404</h1>
        <p>Lo sentimos, no pudimos encontrar la página que estas buscando.</p>
        <br>
        <a onclick="event.preventDefault();window.history.back()" class="btn btn-primary" href="#">Volver a la página anterior</a>
    </div>
@endsection
