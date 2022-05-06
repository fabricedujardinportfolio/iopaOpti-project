@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @include('partials.navbar')
            </div>
        </div>
        <div class="col-md-12">
            <div class="container rounded bg-white mt-5 mb-5">
                <form action="{{ route('addPost')}}" method="post" id="form">
                    @csrf
                <div class="row">
                    <div class="col-md-3 border-right">
                        <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img
                                class="rounded-circle mt-5" width="150px"
                                src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span
                                class="font-weight-bold"></span>
                        </div>
                        <div class="p-3 py-5">
                            <div class="d-flex justify-content-between align-items-center experience"><span>Les expériences</span>
                                <button class="btn btn-primary profile-button border add-experience">
                                    <i class="fa fa-plus"></i>Ajouter +</button>
                                </div><br>
                        </div>
                    </div>
                    <div class="col-md-9 border-right">
                        <div class="p-3 py-5">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4 class="text-right">Rajouter un profil</h4>
                            </div>
                            <div class="row mt-2">                                
                                @if($nameCandidate === 0)
                                <div class="col-md-6"><label class="labels">Prénom</label><input type="text"
                                    class="form-control" placeholder="first name"
                                    value="" name="name_individu"></div>
                                 @else
                                 <div class="col-md-6"><label class="labels">Prénom</label><input type="text"
                                    class="form-control" placeholder="first name"
                                    value="{{ $nameCandidate }}" name="name_individu"></div>
                                 @endif                                
                                <div class="col-md-6"><label class="labels">Nom de famille</label><input
                                        type="text" class="form-control" value="" placeholder="nomDeFamille" name="lastName_individu"></div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12"><label class="labels">Numéro de portable</label><input
                                        type="text" class="form-control" placeholder="entrer le numéro de portable"
                                        value=""></div>
                                <div class="col-md-12"><label class="labels">Adresse 1</label><input
                                        type="text" class="form-control" placeholder="entrer une deuxieme une adresse"
                                        value="">
                                </div>
                                <div class="col-md-12"><label class="labels">Adresse 2</label><input
                                        type="text" class="form-control" placeholder="entrer une deuxieme address"
                                        value="">
                                </div>
                                <div class="col-md-12"><label class="labels">Code postal</label><input
                                        type="text" class="form-control" placeholder="entrer un code postal" value="">
                                </div>
                                <div class="col-md-12"><label class="labels">Commune</label><input type="text"
                                        class="form-control" placeholder="entrer une commune" value=""></div>
                                <div class="col-md-12"><label class="labels">Ville</label><input type="text"
                                        class="form-control" placeholder="entrer une ville" value=""></div>
                                <div class="col-md-12"><label class="labels">Email: Identifiant de
                                        messagerie</label><input type="text" class="form-control"
                                        placeholder="entrer un identifiant de messagerie" value=""></div>
                            </div>
                            <div class="mt-5 text-center">
                                <button class="btn btn-primary profile-button" type="submit">
                                    Enregistrer le profil</button>
                            </div>
                        </div>
                    </div>
                        <div class="col-md-1"></div>                        
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
@endsection
