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
                <div class="row">
                    <div class="col-md-12"> {{ __('Date du prochain Rendez-vous : ') }} <strong>15/03/2022 </strong>
                        avec : Fabrice</div>
                    <div class="col-md-3 border-right">
                        <div class="d-flex flex-column align-items-center text-center p-3 py-3"><img
                                class="rounded-circle mt-5" width="150px"
                                src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span
                                class="font-weight-bold">{{ $individu->first()->name_individu }}</span><span
                                class="text-black-50">edogaru@mail.com.my</span><span> </span>
                        </div>
                        <div class="p-3 py-1">
                            <div class="d-flex justify-content-between align-items-center experience"><span>Les
                                    expériences</span>
                                <button class="btn btn-primary profile-button border add-experience">
                                    <i class="fa fa-plus"></i>Ajouter +</button>
                            </div><br>
                            <div class="col-md-12">
                                <label class="labels">Expérience en conception</label><input type="text"
                                    class="form-control" placeholder="Plus de détail sur Experience" value="">
                            </div>
                            <br>
                        </div>
                        <div class="">
                            <div class="col-md-12">
                                <label class="labels">Dernier commentaire sur l'individu</label><input type="text"
                                    class="form-control" placeholder="Plus de détail sur Experience" value=""
                                    readonly="readonly" style="min-height: 100px">
                            </div>
                            <br>
                        </div>
                    </div>
                    <div class="col-md-9 border-right">
                        <div class="p-3 py-5">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4 class="text-right">Info du profil</h4>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-6"><label class="labels">Prénom</label><input type="text"
                                        class="form-control" placeholder="first name"
                                        value="{{ $individu->first()->name_individu }}"></div>
                                <div class="col-md-6"><label class="labels">Nom de famille</label><input
                                        type="text" class="form-control"
                                        value="{{ $individu->first()->lastName_individu }}" placeholder="nomDeFamille">
                                </div>
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
                                        class="form-control" placeholder="entrer une commune"
                                        value="{{ $individu->first()->regionBirth_individu }}"></div>
                                <div class="col-md-12"><label class="labels">Quartier</label><input type="text"
                                        class="form-control" placeholder="entrer un quartier" value=""></div>
                                <div class="col-md-12"><label class="labels">Email: Identifiant de
                                        messagerie</label><input type="text" class="form-control"
                                        placeholder="entrer un identifiant de messagerie" value=""></div>
                            </div>
                            <div class="mt-5 text-center">
                                <button class="btn btn-primary profile-button" type="button">
                                    Enregistrer le profil</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 d-flex">
                        <div class="col-md-1"></div>
                        <div class="col-md-10">
                            <div class="p-3 py-5">
                                <div class="d-flex justify-content-between align-items-center experience">
                                    <h2>Les fiches de {{ $individu->first()->name_individu }}</h2>
                                    <ul class="nav nav-tabs">
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#"
                                                role="button" aria-expanded="false">Ajouter une fiche</a>
                                            <ul class="dropdown-menu">
                                                @if ($fichePaios !== 'Aucune fiche Paio')
                                                    <li><a class="dropdown-item"
                                                            href="ficheCandidate/{{ $fichePaios->first()->iopa_fiche_type_paio_id }}"
                                                            style="background-color: #6e7175 !important;color:white;">PAIO :
                                                            Il existe déja une fiche PAIO</a></li>
                                                @else
                                                    <li><a class="dropdown-item" href="ficheCandidate/">PAIO : Fiche de
                                                            suivi Candidat</a></li>
                                                @endif
                                                <li><a class="dropdown-item" href="#">Vae : Fiche analyse de demande</a>
                                                </li>
                                                <li><a class="dropdown-item" href="#">Atelier : Questionaire de
                                                        motivation</a></li>
                                                <li><a class="dropdown-item" href="#">Spot : Fiche d'inscription spot</a>
                                                </li>
                                                <li>
                                                    <hr class="dropdown-divider">
                                                </li>
                                                @if ($ficheSpips !== 'Aucune fiche Spip')
                                                    <li><a class="dropdown-item"
                                                            href="ficheSuiviSpip/{{ $ficheSpips->first()->iopa_fiche_type_spip_id }}"
                                                            style="background-color: #6e7175 !important;color:white;">SPIP :
                                                            Il existe déja une fiche Spip</a></li>
                                                @else
                                                    <li><a class="dropdown-item" href="#">Spip : Fiche de suivi spip</a>
                                                    </li>
                                                @endif
                                            </ul>
                                        </li>
                                    </ul>
                                </div><br>

                                <section>
                                    <div class="container py-3">
                                        <span style="text-decoration-line: underline;">Fiche type : Paio</span>
                                        @if ($fichePaios !== 'Aucune fiche Paio')
                                            @foreach ($fichePaios as $fichePaio)
                                                <div class="card my-2">
                                                    <div class="row ">
                                                        <div class="col-md-12 px-3 py-2">
                                                            <div class="card-block px-3">
                                                                <h4 class="card-title">
                                                                    {{ $fichePaio->iopa_fiche_type_paio_title }}</h4>
                                                                <p class="card-text">Consectetur adipiscing elit, sed
                                                                    do eiusmod tempor incididunt ut labore et dolore magna
                                                                    aliqua. Ut enim ad minim veniam, quis nostrud
                                                                    exercitation ullamco laboris nisi ut aliquip ex ea
                                                                    commodo consequat. </p>
                                                                <p class="card-text">Duis aute irure dolor in
                                                                    reprehenderit in voluptate velit esse cillum dolore eu
                                                                    fugiat nulla pariatur. Excepteur sint occaecat cupidatat
                                                                    non proident, sunt in culpa qui officia deserunt mollit
                                                                    anim id est laborum.</p>
                                                                <a href="#" class="btn btn-primary">Lire la fiche</a>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            <p colspan="9" class="table-active text-center">{{ $fichePaios }}</p>
                                        @endif
                                        <span style="text-decoration-line: underline;">Fiche type : Vae</span>
                                        @if ($ficheVaes !== 'Aucune fiche Vae')
                                            @foreach ($ficheVaes as $ficheVae)
                                                <div class="card my-2">
                                                    <div class="row ">
                                                        <div class="col-md-12 px-3 py-2">
                                                            <div class="card-block px-3">
                                                                <h4 class="card-title">
                                                                    {{ $ficheVae->iopa_fiche_type_vae_title }}</h4>
                                                                <p class="card-text">Consectetur adipiscing elit, sed
                                                                    do eiusmod tempor incididunt ut labore et dolore magna
                                                                    aliqua. Ut enim ad minim veniam, quis nostrud
                                                                    exercitation ullamco laboris nisi ut aliquip ex ea
                                                                    commodo consequat. </p>
                                                                <p class="card-text">Duis aute irure dolor in
                                                                    reprehenderit in voluptate velit esse cillum dolore eu
                                                                    fugiat nulla pariatur. Excepteur sint occaecat cupidatat
                                                                    non proident, sunt in culpa qui officia deserunt mollit
                                                                    anim id est laborum.</p>
                                                                <a href="{{ $ficheVae->iopa_fiche_type_vae_id }}"
                                                                    class="btn btn-primary">Lire la fiche</a>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            @endforeach
                                            {{ $ficheVaes->links() }}
                                        @else
                                            <p colspan="9" class="table-active text-center">{{ $ficheVaes }}</p>
                                        @endif
                                        <span style="text-decoration-line: underline;">Fiche type : Atelier</span>
                                        <p colspan="9" class="table-active text-center"
                                            style="border: 1px solid darkgreen; background-color: #6e7175 !important;color:white;padding:5px;">
                                            Aucune fiche Atelier</p>
                                        <span style="text-decoration-line: underline;">Fiche type : Spot</span>
                                        @if ($ficheSpots !== "Aucune fiche Spot")
                                            @foreach ($ficheSpots as $ficheSpot)
                                                <div class="card my-2">
                                                    <div class="row ">
                                                        <div class="col-md-12 px-3 py-2">
                                                            <div class="card-block px-3">
                                                                <h4 class="card-title">
                                                                    {{ $ficheSpot->iopa_fiche_type_spot_title }}</h4>
                                                                <p class="card-text">Consectetur adipiscing elit, sed
                                                                    do eiusmod tempor incididunt ut labore et dolore magna
                                                                    aliqua. Ut enim ad minim veniam, quis nostrud
                                                                    exercitation ullamco laboris nisi ut aliquip ex ea
                                                                    commodo consequat. </p>
                                                                <p class="card-text">Duis aute irure dolor in
                                                                    reprehenderit in voluptate velit esse cillum dolore eu
                                                                    fugiat nulla pariatur. Excepteur sint occaecat cupidatat
                                                                    non proident, sunt in culpa qui officia deserunt mollit
                                                                    anim id est laborum.</p>
                                                                <a href="{{ $ficheSpot->iopa_fiche_type_spot_id }}"
                                                                    class="btn btn-primary">Lire la fiche</a>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            @endforeach                                            
                                        {{ $ficheSpots->links() }}
                                        @else
                                            <p colspan="9" class="table-active text-center" style="border: 1px solid darkgreen; background-color: #6e7175 !important;color:white;padding:5px;">{{ $ficheSpots }}</p>
                                        @endif
                                        <span style="text-decoration-line: underline;">Fiche type : Spip</span>
                                        @if ($ficheSpips !== 'Aucune fiche Spip')
                                            @foreach ($ficheSpips as $ficheSpip)
                                                <div class="card my-2">
                                                    <div class="row ">
                                                        <div class="col-md-12 px-3 py-2">
                                                            <div class="card-block px-3">
                                                                <h4 class="card-title">
                                                                    {{ $ficheSpip->iopa_fiche_type_spip_title }}</h4>
                                                                <p class="card-text">Consectetur adipiscing elit, sed
                                                                    do eiusmod tempor incididunt ut labore et dolore magna
                                                                    aliqua. Ut enim ad minim veniam, quis nostrud
                                                                    exercitation ullamco laboris nisi ut aliquip ex ea
                                                                    commodo consequat. </p>
                                                                <p class="card-text">Duis aute irure dolor in
                                                                    reprehenderit in voluptate velit esse cillum dolore eu
                                                                    fugiat nulla pariatur. Excepteur sint occaecat cupidatat
                                                                    non proident, sunt in culpa qui officia deserunt mollit
                                                                    anim id est laborum.</p>
                                                                <a href="#" class="btn btn-primary">Lire la fiche</a>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            <p colspan="9" class="table-active text-center"
                                                style="border: 1px solid darkgreen; background-color: #6e7175 !important;color:white;padding:5px;">
                                                {{ $ficheSpips }}</p>
                                        @endif
                                    </div>
                            </div>
                            </section>
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>
@endsection
