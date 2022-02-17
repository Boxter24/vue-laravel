@extends('layouts.app')

@section('content')
<div class="container">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="container d-flex justify-content-center">
        
        <a class="nav-item nav-link active" href="{{ route("home") }}">Home</a>
        
        <a class="nav-item nav-link" href="{{ route("estado") }}">Paises</a>
        <a class="nav-item nav-link" href="#">Estados</a>
        
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">CRUD</div>
                <div class="card-body">
                    <estado />  
                </div>                
            </div>
        </div>
    </div>
</div>
@endsection
