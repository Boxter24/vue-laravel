<style>
    #estado{
        display:none;
    }
    #pais{
        display: none;
    }
</style>
@extends('layouts.app')

@section('content')

<div class="container">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="container d-flex justify-content-center">
        
        <button id="usuarios" class="btn btn-success mr-2" onclick="user()">Usuarios</button>
        
        <button id="estados" class="btn btn-success mr-1 ml-1" onclick="estado()">Estados</button>
        <button id="estados" class="btn btn-success ml-2" onclick="pais()">Paises</button>
        
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">CRUD</div>
                <div class="card-body">
                    <div id="usuario"><usuario /> </div>
                    <div id="estado"><estado />  </div>
                    <div id="pais"><pais /></div>
                </div>                
            </div>
        </div>
    </div>
</div>
@endsection
<script>
    function pais(){
        let active = document.getElementById("pais").style.display = "block"
        let inactive1 = document.getElementById("usuario").style.display = "none"
        let inactive2 = document.getElementById("estado").style.display = "none"
    }
    function estado(){
        let active = document.getElementById("estado").style.display = "block"
        let inactive1 = document.getElementById("usuario").style.display = "none"
        let inactive2 = document.getElementById("pais").style.display = "none"
    }
    function user(){
        let active = document.getElementById("usuario").style.display = "block"
        let inactive1 = document.getElementById("estado").style.display = "none"
        let inactive2 = document.getElementById("pais").style.display = "none"
    }
</script>
