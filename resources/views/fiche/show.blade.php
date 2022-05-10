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
                <form action="{{ route('updateFiche', $individu->first()->iopa_individu_id) }}" method="post" id="form">
                    @csrf
                    <div class="row">
                        <div class="col-md-12"> {{ __('Date du prochain Rendez-vous : ') }} <strong>15/03/2022
                            </strong>
                            avec : Fabrice</div>
                        <div class="col-md-3 border-right">
                            <div class="d-flex flex-column align-items-center text-center p-3 py-3"><img
                                    class="rounded-circle mt-5" width="150px"
                                    @if ($individu->first()->sexe_individu !== 'non-définie') @if ($individu->first()->sexe_individu === 'masculin')
                                        src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"
                                        @elseif($individu->first()->sexe_individu === 'feminin') 
                                        src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRSPm8mq1tN_GVayhZLsqZnpsIGcMLaz2bxyw&usqp=CAU" @endif
                                @else src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRSPm8mq1tN_GVayhZLsqZnpsIGcMLaz2bxyw&usqp=CAU" @endif
                                ><span
                                    class="font-weight-bold text-capitalize">{{ $individu->first()->name_individu }}</span><span
                                    class="text-black-50">{{ $individu->first()->email_individu }}</span><span> </span>
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
                                    <label class="labels">Dernier commentaire sur l'individu</label><input
                                        type="text" class="form-control" placeholder="Plus de détail sur Experience"
                                        value="" readonly="readonly" style="min-height: 100px">
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
                                    <div class="col-md-6"><label class="labels">Prénom</label><input
                                            type="text" class="form-control" placeholder="first name"
                                            value="{{ $individu->first()->name_individu }}" name="name_individu" required>
                                    </div>
                                    <div class="col-md-6"><label class="labels">Nom de famille</label><input
                                            type="text" class="form-control"
                                            value="{{ $individu->first()->lastName_individu }}" placeholder="nomDeFamille"
                                            name="lastName_individu" required>
                                    </div>
                                    <div class="col-md-6"><label class="labels">Nom de jeune
                                            fille</label><input type="text" class="form-control text-capitalize"
                                            value="{{ $individu->first()->maidenName_individu }}"
                                            placeholder="Nom de jeune fille" name="maidenName_individu" required></div>
                                    <div class="col-md-6"><label class="labels">Nationalité</label><input
                                            type="text" class="form-control text-capitalize"
                                            value="{{ $individu->first()->nationality_individu }}"
                                            placeholder="Nationalité" name="nationality_individu" required></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3" style="align-self: center;">
                                        <div class="d-md-flex d-block">
                                            <h6 class="firstBoxe mt-auto">Sexe :</h6>
                                            <div class="form-check m-1">
                                                <input class="form-check-input" type="radio" name="sexe_individu"
                                                    id="masculin" value="masculin"
                                                    @if ($individu->first()->sexe_individu !== 'non-définie') @if ($individu->first()->sexe_individu == 'masculin')
                                                    checked
                                                    @elseif($individu->first()->sexe_individu === 'feminin') @endif
                                                @else checked @endif
                                                <label class="form-check-label" for="masculin">
                                                    Masculin
                                                </label>
                                            </div>
                                            <div class="form-check m-1">
                                                <input class="form-check-input" type="radio" name="sexe_individu"
                                                    id="feminin" value="feminin"
                                                    @if ($individu->first()->sexe_individu !== 'non-définie') @if ($individu->first()->sexe_individu == 'feminin')
                                                    checked
                                                    @elseif($individu->first()->sexe_individu === 'masculin') @endif
                                                @else checked @endif>

                                                <label class="form-check-label" for="feminin">
                                                    Féminin
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3"><label class="labels">Numéro de
                                            portable</label><input type="text" class="form-control"
                                            placeholder="entrer le numéro de portable"
                                            value="{{ $individu->first()->portable_individu }}" name="portable_individu"
                                            @if ($individu->first()->portable_individu !== 'non-définie') pattern="[0-9]{2}[-][0-9]{2}[-][0-9]{2}"
                                            @else @endif
                                            required>
                                    </div>
                                    <div class="col-md-4"><label class="labels">Date de naissance :
                                            <em>12-12-2000</em> </label><input type="text" class="form-control"
                                            placeholder="entrer la date de naissance de Individu"
                                            value="{{ $individu->first()->dateofBirth_individu }}"
                                            name="dateofBirth_individu"
                                            @if ($individu->first()->dateofBirth_individu !== 'non-définie') pattern="^([0]?[1-9]|[1|2][0-9]|[3][0|1])[-]([0]?[1-9]|[1][0-2])[-]([0-9]{4}|[0-9]{2})$"
                                            @else @endif
                                            required>
                                    </div>

                                    <div class="col-md-2"><label class="labels">
                                            <?php
                                            if ($parseCarboneSolo !== 'Définir la date de naissance') {
                                                echo 'Age';
                                            } else {
                                                print $parseCarboneSolo;
                                            }
                                            ?>
                                        </label>
                                        <input type="text" class="form-control" placeholder="Définir date de naissance"
                                            value="{{ $parseCarboneSolo }}" disabled>
                                    </div>
                                    <div class=" col-12 col-md-6 d-md-flex d-block" style="align-self: center;">
                                        <div class="form-check m-1">
                                            <input class="form-check-input" type="radio" name="familyStatus_individu"
                                                id="celibataire" value="celibataire"
                                                @if ($individu->first()->familyStatus_individu !== 'non-définie') @if ($individu->first()->familyStatus_individu === 'celibataire')
                                                    checked
                                                    @else
                                                    @endif
                                            @else @endif>
                                            <label class="form-check-label" for="celibataire">
                                                Célibataire
                                            </label>
                                        </div>
                                        <div class="form-check m-1">
                                            <input class="form-check-input" type="radio" name="familyStatus_individu"
                                                id="couple" value="couple"
                                                @if ($individu->first()->familyStatus_individu !== 'non-définie') 
                                                    @if ($individu->first()->familyStatus_individu === 'couple')
                                                    checked
                                                    @else @endif
                                            @else checked @endif>
                                            <label class="form-check-label" for="couple">
                                                En couple
                                            </label>
                                        </div>
                                        <div class="form-check m-1">
                                            <input class="form-check-input" type="radio" name="familyStatus_individu"
                                                id="marie" value="marie"
                                                @if ($individu->first()->familyStatus_individu !== 'non-définie') @if ($individu->first()->familyStatus_individu === 'marie')
                                                    checked
                                                    @else @endif
                                            @else @endif>
                                            <label class="form-check-label" for="marie">
                                                Marié(e)
                                            </label>
                                        </div>
                                        <div class="form-check m-1">
                                            <input class="form-check-input" type="radio" name="familyStatus_individu"
                                                id="separeDivorce" value="Séparé(e)/Divorcé(e)"
                                                @if ($individu->first()->familyStatus_individu !== 'non-définie') @if ($individu->first()->familyStatus_individu === 'Séparé(e)/Divorcé(e)')
                                                    checked
                                                    @else @endif
                                            @else @endif>
                                            <label class="form-check-label" for="separeDivorce">
                                                Séparé(e)/Divorcé(e)
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-3"><label class="labels">Lieu de naissance :</label>
                                        <input type="text" class="form-control"
                                            placeholder="Lieu de naissance de Individu"
                                            value="{{ $individu->first()->communeBirth_individu }}"
                                            name="communeBirth_individu" required>
                                    </div>
                                    <div class="col-md-3"><label class="labels">Nombre d'enfants à charge :</label>
                                        <input type="text" class="form-control"
                                            placeholder="Nombre d'enfants à charge"
                                            value="{{ $individu->first()->dependentChildren_individu }}"
                                            name="dependentChildren_individu" required>
                                    </div>
                                    <div class="col-md-12"><label class="labels">Adresse 1</label><input
                                            type="text" class="form-control" placeholder="entrer une deuxieme une adresse"
                                            value="{{ $individu->first()->adresse_individu }}" name="adresse_individu"
                                            required>
                                    </div>
                                    <div class="col-md-12"><label class="labels">Adresse 2
                                            deuxieme</label><input type="text" class="form-control"
                                            placeholder="entrer une deuxieme address"
                                            value="{{ $individu->first()->deuxiemeAdresse_individu }}"
                                            name="deuxiemeAdresse_individu" required>
                                    </div>
                                    <div class="col-md-12"><label class="labels">Code postal </label><input
                                            type="text" class="form-control" placeholder="entrer un code postal"
                                            value="{{ $individu->first()->postalAdresse_individu }}" required>
                                    </div>
                                    <div class="col-md-12"><label class="labels">Commune </label><input
                                            type="text" class="form-control" placeholder="entrer une commune"
                                            value="{{ $individu->first()->commune_individu }}" required></div>
                                    <div class="col-md-12"><label class="labels">Quartier</label><input
                                            type="text" class="form-control" placeholder="entrer un quartier"
                                            value="{{ $individu->first()->quartier_individu }}" required></div>
                                    <div class="col-md-12"><label class="labels">Email: Identifiant de
                                            messagerie</label><input type="text" class="form-control"
                                            placeholder="entrer un identifiant de messagerie"
                                            value="{{ $individu->first()->email_individu }}" required></div>
                                </div>
                                <div class="mt-5 text-center">
                                    <button class="btn btn-primary profile-button" type="submit">
                                        Enregistrer le profil</button>
                                </div>
                            </div>
                        </div>
                </form>
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
                                    <div class="p-2">
                                        <span
                                            style="text-decoration-line: underline; background-color: #94c123; color:white;"
                                            class="p-2" id="ficheVae">Fiche type : Paio</span>
                                    </div>
                                    @if ($fichePaios !== 'Aucune fiche Paio')
                                        @foreach ($fichePaios as $fichePaio)
                                            <div class="card my-2" style="background-color: #c5d994;">
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
                                        <p colspan="9" class="table-active text-center p-2 mt-2"
                                            style="border: 1px solid darkgreen; background-color: #6e7175 !important;color:white;padding:5px;">
                                            {{ $fichePaios }}</p>
                                    @endif
                                    <hr class="dropdown-divider">
                                    <div class="p-2">
                                        <span
                                            style="text-decoration-line: underline; background-color: #6aa1db; color:white;"
                                            class="p-2" id="ficheVae">Fiche type : Vae</span>
                                    </div>
                                    @if ($ficheVaes !== 'Aucune fiche Vae')
                                        @foreach ($ficheVaes as $ficheVae)
                                            <div class="card my-2" style="background-color: #b7d6f8;">
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
                                        <p colspan="9" class="table-active text-center p-2 mt-2"
                                            style="border: 1px solid darkgreen; background-color: #6e7175 !important;color:white;padding:5px;">
                                            {{ $ficheVaes }}</p>
                                    @endif
                                    <hr class="dropdown-divider">
                                    <div class="p-2">
                                        <span
                                            style="text-decoration-line: underline; background-color: #f7ab59; color:white;"
                                            class="p-2 mt-2" id="ficheSpot">Fiche type : Atelier</span>
                                    </div>
                                    @if ($ficheAteliers !== 'Aucune fiche Atelier')
                                        @foreach ($ficheAteliers as $ficheAtelier)
                                            <div class="card my-2" style="background-color: #e3b482;">
                                                <div class="row ">
                                                    <div class="col-md-12 px-3 py-2">
                                                        <div class="card-block px-3">
                                                            <h4 class="card-title">
                                                                {{ $ficheAtelier->iopa_fiche_type_atelier_title }}</h4>
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
                                                            <a href="{{ $ficheAtelier->iopa_fiche_type_atelier_id }}"
                                                                class="btn btn-primary">Lire la fiche</a>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        @endforeach
                                        {{ $ficheAteliers->links() }}
                                    @else
                                        <p colspan="9" class="table-active text-center p-2 mt-2"
                                            style="border: 1px solid darkgreen; background-color: #6e7175 !important;color:white;padding:5px;">
                                            {{ $ficheAteliers }}</p>
                                    @endif
                                    <hr class="dropdown-divider">
                                    <div class="p-2">
                                        <span
                                            style="text-decoration-line: underline; background-color: #b12036; color:white;"
                                            class="p-2 mt-2" id="ficheSpot">Fiche type : Spot</span>
                                    </div>
                                    @if ($ficheSpots !== 'Aucune fiche Spot')
                                        @foreach ($ficheSpots as $ficheSpot)
                                            <div class="card my-2" style="background-color: #d47584;">
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
                                        <p colspan="9" class="table-active text-center p-2 mt-2"
                                            style="border: 1px solid darkgreen; background-color: #6e7175 !important;color:white;padding:5px;">
                                            {{ $ficheSpots }}</p>
                                    @endif
                                    <hr class="dropdown-divider">
                                    <div class="p-2">
                                        <span
                                            style="text-decoration-line: underline; background-color: #6ec6d9; color:white;"
                                            class="p-2 mt-2" id="ficheSpot">Fiche type : Spip</span>
                                    </div>
                                    @if ($ficheSpips !== 'Aucune fiche Spip')
                                        @foreach ($ficheSpips as $ficheSpip)
                                            <div class="card my-2" style="background-color: #a3d3de;">
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
                                        <p colspan="9" class="table-active text-center p-2 mt-2"
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
