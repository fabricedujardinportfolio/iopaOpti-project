<?php

?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand m-auto" href="#">
        <img src="{{ asset('images/Puce-i-Information-Orientation.png') }}" width="30" height="30" class="d-inline-block align-top" alt="">
        OPA PROJECT
    </a>
    <div class="text-center col-12">
        <ul class="navbar-nav col-8 m-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/">Accueil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Rajouter un demandeur</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Importer les données</a>
            </li>
            <li class=" text-right">
                <a class="nav-link " href="#" onclick="myFunction()">Changer de mot de passe</a>
            </li>
        </ul>
    </div>
</nav>
<div class="d-flex flex-column flex-shrink-0 p-3 bg-light">
    <div class="text-center mt-3 mb-2 ">
        <!-- Ce champ est à destination d'une popup  elle récupére une variabale déclarer dans le controller qui affichera 
                        si une action de l'utilisateur ces bien passer  (variabale : success) -->
        @if(session()->has('success'))
        <div class="container d-flex mt-3">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="alert alert-success text-center alertDismissible">
                    <strong>
                        {{session()->get('success')}}
                    </strong>
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>
        @endif
        <!-- Ce champ est à destination d'une popup  elle récupére une variabale déclarer dans le controller qui affichera 
                        si une action de l'utilisateur ces male passer (variabale : danger) -->
        @if(session()->has('danger'))
        <div class="container d-flex mt-3">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="alert alert-danger text-center alertDismissible">
                    <strong>
                        {{session()->get('danger')}}
                    </strong>
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>
        @endif
        <div>
            <strong>{{$agent->email}}</strong>
        </div>
        <div>
            <strong></strong>
        </div>
        <div>
            <strong><a href="logout">Déconnexion</a></strong>
        </div>
        </a>
    </div>