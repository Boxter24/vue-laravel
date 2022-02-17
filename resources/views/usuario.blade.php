@extends('layouts.app')

@section('content')

<div class="container" id="app">  
    <div class="container d-flex justify-content-center">
        
        <a class="nav-item nav-link active" href="#">Home</a>
        <a class="nav-item nav-link" href="{{ route("estado") }}">Paises</a>
        <a class="nav-item nav-link" href="{{ route("pais") }}">Paises</a>
        <a class="nav-item nav-link" href="{{ route("usuario") }}">Estados</a>        
    </div>  
    <usuario />
</div>
  
@endsection
