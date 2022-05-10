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
                                    value="non-définie" name="name_individu" required></div>
                                 @else
                                 <div class="col-md-6"><label class="labels">Prénom</label><input type="text"
                                    class="form-control" placeholder="first name"
                                    value="{{ $nameCandidate }}" name="name_individu" required></div>
                                 @endif                                
                                <div class="col-md-6"><label class="labels">Nom de famille</label><input
                                        type="text" class="form-control" value="non-définie" placeholder="nomDeFamille" name="lastName_individu" required></div>
                            </div>
                            <div class="col-md-12"><label class="labels">Date de naissance :
                                <em>12-12-2000</em> </label><input type="text" class="form-control"
                                placeholder="entrer la date de naissance de Individu"
                                value="non-définie"
                                name="dateofBirth_individu"
                                pattern="^([0]?[1-9]|[1|2][0-9]|[3][0|1])[-]([0]?[1-9]|[1][0-2])[-]([0-9]{4}|[0-9]{2})$" required>
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
