@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @include('partials.navbar')

            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>

            @endif

            <div class="container d-flex">
                <div class="alertDismissible">
                    {{ __('Tu es connectée!') }}
                </div>
            </div>
            <div class="container">
                <section class="col-md-12">
                    <div class="card">
                        <div class="card-header">{{ __('Date de la création de la fiche de l\'individue : ') }} <strong>15/03/2022 </strong> par : {{$agent->email}}</div>

                        <div class="card-body ">
                            <div class="container m-auto">
                                <div class="col-12 border p-2 mb-1">
                                    <h6 class="firstBoxe">Avez-vous déja rencontré un conceiller? Si oui, ou ?</h6>
                                    <div class="d-md-flex d-block ">
                                        <div class="form-check m-1">
                                            <input class="form-check-input" type="checkbox" value="1" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                GIEP-NC
                                            </label>
                                        </div>
                                        <div class="form-check m-1">
                                            <input class="form-check-input" type="checkbox" value="2" id="flexCheckCheckedespaceJeune" checked>
                                            <label class="form-check-label" for="flexCheckCheckedespaceJeune">
                                                ESPACE JEUNE
                                            </label>
                                        </div>
                                        <div class="form-check m-1">
                                            <input class="form-check-input" type="checkbox" value="3" id="flexCheckDefaultMijpl">
                                            <label class="form-check-label" for="flexCheckDefaultMijpl">
                                                MLIJPN
                                            </label>
                                        </div>
                                        <div class="form-check m-1">
                                            <input class="form-check-input" type="checkbox" value="4" id="flexCheckCheckedEpife" checked>
                                            <label class="form-check-label" for="flexCheckCheckedEpife">
                                                EPIFE
                                            </label>
                                        </div>
                                        <div class="form-check m-1">
                                            <input class="form-check-input" type="checkbox" value="5" id="flexCheckCheckedDel" checked>
                                            <label class="form-check-label" for="flexCheckCheckedDel">
                                                DEL
                                            </label>
                                        </div>
                                        <div class="form-check m-1">
                                            <input class="form-check-input" type="checkbox" value="6" id="flexCheckCheckedCapEmploi" checked>
                                            <label class="form-check-label" for="flexCheckCheckedCapEmploi">
                                                Cap emploi
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="container m-auto">
                                <div class="col-12 border p-2">
                                    <!-- Identité du candidat -->
                                    <!-- Premier paragraphe  -->
                                    <h6 class="twoBoxe text-uppercase"><strong>identité</strong></h6>
                                    <form action="{{ route('addPost')}}" method="post" id="form">
                                        @csrf
                                        <div class="row g-3">
                                            <div class="col-sm-6">
                                                <label for="firstName" class="form-label">
                                                    <font style="vertical-align: inherit;">
                                                        <font style="vertical-align: inherit;">Prénom</font>
                                                    </font>
                                                </label>
                                                <input type="text" class="form-control" id="firstName" placeholder="" value="{{ $individu->first()->name_individu }}" name="firstName" >
                                                <div class="invalid-feedback">
                                                    Remplissez ce champ
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <label for="lastName" class="form-label">
                                                    <font style="vertical-align: inherit;">
                                                        <font style="vertical-align: inherit;">Nom de famille</font>
                                                    </font>
                                                </label>
                                                <input type="text" class="form-control" id="lastName" placeholder="" value="" >
                                                <div class="invalid-feedback">Remplissez ce champ
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <label for="maidenName" class="form-label">
                                                    <font style="vertical-align: inherit;">
                                                        <font style="vertical-align: inherit;">Nom de jeune fille</font>
                                                    </font>
                                                </label>
                                                <input type="text" class="form-control" id="maidenName" placeholder="" value="" >
                                                <div class="invalid-feedback">
                                                    Remplissez ce champ
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <label for="nationality" class="form-label">
                                                    <font style="vertical-align: inherit;">
                                                        <font style="vertical-align: inherit;">Nationalité</font>
                                                    </font>
                                                </label>
                                                <input type="text" class="form-control" id="nationality" placeholder="" value="">
                                                <div class="invalid-feedback">Remplissez ce champ
                                                </div>
                                            </div>
                                            <div class="d-md-flex d-block">
                                                <h6 class="firstBoxe mt-auto">Sexe :</h6>
                                                <div class="form-check m-1">
                                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="masculin">
                                                    <label class="form-check-label" for="masculin">
                                                        Masculin
                                                    </label>
                                                </div>
                                                <div class="form-check m-1">
                                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="feminin" checked>
                                                    <label class="form-check-label" for="feminin">
                                                        Féminin
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <label for="dateofBirth" class="form-label">
                                                    <font style="vertical-align: inherit;">
                                                        <font style="vertical-align: inherit;">Date et lieu de naissance</font>
                                                    </font>
                                                </label>
                                                <input type="date" class="form-control " id="dateofBirth" name="dateofBirth">
                                                </select>
                                                <div class="invalid-feedback">Remplissez ce champ
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <label for="region" class="form-label">
                                                    <font style="vertical-align: inherit;">
                                                        <font style="vertical-align: inherit;">à</font>
                                                    </font>
                                                </label>
                                                <input type="text" class="form-control" name="region" id="region">
                                                <div class="invalid-feedback">Remplissez ce champ
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <label for="age" class="form-label">
                                                    <font style="vertical-align: inherit;">
                                                        <font style="vertical-align: inherit;">Age</font>
                                                    </font>
                                                </label>
                                                <input type="number" class="form-control" name="age" id="age">
                                                <div class="invalid-feedback">Remplissez ce champ
                                                </div>
                                            </div>
                                            <div class=" col-12 d-md-flex d-block">
                                                <div class=" col-12 col-md-6 d-md-flex d-block">
                                                    <div class="form-check m-1">
                                                        <input class="form-check-input" type="radio" name="situationCandidat" id="celibataire">
                                                        <label class="form-check-label" for="celibataire">
                                                            Célibataire
                                                        </label>
                                                    </div>
                                                    <div class="form-check m-1">
                                                        <input class="form-check-input" type="radio" name="situationCandidat" id="couple" checked>
                                                        <label class="form-check-label" for="couple">
                                                            En couple
                                                        </label>
                                                    </div>
                                                    <div class="form-check m-1">
                                                        <input class="form-check-input" type="radio" name="situationCandidat" id="marie">
                                                        <label class="form-check-label" for="marie">
                                                            Marié(e)
                                                        </label>
                                                    </div>
                                                    <div class="form-check m-1">
                                                        <input class="form-check-input" type="radio" name="situationCandidat" id="separeDivorce">
                                                        <label class="form-check-label" for="separeDivorce">
                                                            Séparé(e)/Divorcé(e)
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6 d-md-flex d-block">
                                                    <div class="col-1"></div>
                                                    <div class="col-9 text-end p-1">
                                                        <label for="nbrEnfant" class="form-label">
                                                            <font style="vertical-align: inherit;">
                                                                <font style="vertical-align: inherit;">Nombre d'enfants à charge</font>
                                                            </font>
                                                        </label>
                                                    </div>
                                                    <div class="col-12 col-md-2 d-md-flex d-block">
                                                        <input type="number" class="form-control" name="nbrEnfant" id="nbrEnfant" min="0" max="98">
                                                        <div class="invalid-feedback">Remplissez ce champ
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                            <!-- FIN du Premier paragraphe  -->

                                            <!-- coordonées du candidat -->
                                            <!-- deuxième paragraphe  -->
                                            <div class="col-md-7 col-12">
                                                <h6 class="twoBoxe text-uppercase"><strong>coordonées</strong></h6>
                                                <div class="col-12">
                                                    <label for="address" class="form-label">
                                                        <font style="vertical-align: inherit;">
                                                            <font style="vertical-align: inherit;">Adresse de résidence</font>
                                                        </font>
                                                    </label>
                                                    <input type="text" class="form-control" id="address" placeholder="1234 1ère rue">
                                                    <div class="invalid-feedback">Remplissez ce champ
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <label for="address2" class="form-label">
                                                        <font style="vertical-align: inherit;">
                                                            <font style="vertical-align: inherit;">Commune de résidence</font>
                                                        </font><span class="text-muted">
                                                            <font style="vertical-align: inherit;">
                                                                <font style="vertical-align: inherit;">(facultatif)</font>
                                                            </font>
                                                        </span>
                                                    </label>
                                                    <input type="text" class="form-control" id="address2" placeholder="Dumbéa , Nouméa ...">
                                                </div>

                                                <div class="col-12">
                                                    <label for="email" class="form-label">
                                                        <font style="vertical-align: inherit;">
                                                            <font style="vertical-align: inherit;">Email de l'individu</font>
                                                        </font><span class="text-muted">
                                                            <font style="vertical-align: inherit;">
                                                                <font style="vertical-align: inherit;">(facultatif)</font>
                                                            </font>
                                                        </span>
                                                    </label>
                                                    <input type="email" class="form-control" id="email" placeholder="individu@gmail.com">
                                                    <div class="invalid-feedback">Remplissez ce champ
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-1"></div>
                                            <div class="col-md-4 col-12 mt-auto">
                                                <label for="email" class="form-label">
                                                    <font style="vertical-align: inherit;">
                                                        <font style="vertical-align: inherit;">Numéro de téléphone</font>
                                                    </font>
                                                </label>
                                                <div class="col">
                                                    <div class="col-12 d-flex">
                                                        <div class="col-2 m-auto">Tél 1:</div>
                                                        <div class="col-10">
                                                            <input type="tel" class="form-control" id="phone-1" name="phone1" pattern="[0-9]{2}-[0-9]{2}-[0-9]{2}" >
                                                        </div>
                                                    </div>
                                                    <div class="col-12 d-flex">
                                                        <div class="col-2 m-auto">Tél 2:</div>
                                                        <div class="col-10">
                                                            <input type="tel" class="form-control" id="phone-2" name="phone2" pattern="[0-9]{2}-[0-9]{2}-[0-9]{2}" >
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- FIN du deuxième paragraphe  -->
                                            <!-- STATUS du candidat -->
                                            <!-- troisième paragraphe  -->
                                            <div class="container mt-4">
                                                <h6 class="twoBoxe text-uppercase"><strong>status</strong></h6>
                                                <div class="d-md-flex d-block col-6 col-md-12">
                                                    <div class="form-check m-1 col-2 statusCenter">
                                                        <input class="form-check-input" type="radio" value="1" id="flexCheckDefaultCDD" name="statusIndividu">
                                                        <label class="form-check-label" for="flexCheckDefaultCDD">
                                                            Salarié CDD
                                                        </label>
                                                    </div>
                                                    <div class="form-check m-1 col-2 statusCenter">
                                                        <input class="form-check-input" type="radio" value="2" id="flexCheckDefaultCdi" name="statusIndividu">
                                                        <label class="form-check-label" for="flexCheckDefaultCdi">
                                                            Salarié CDI
                                                        </label>
                                                    </div>
                                                    <div class="form-check m-1 col-2 statusCenter">
                                                        <input class="form-check-input" type="radio" value="3" id="flexCheckDefaultinterime" name="statusIndividu">
                                                        <label class="form-check-label" for="flexCheckDefaultinterime">
                                                            Intérim
                                                        </label>
                                                    </div>
                                                    <div class="form-check m-1 col-2 statusCenter">
                                                        <input class="form-check-input" type="radio" value="4" id="flexCheckDefaultpatente" name="statusIndividu">
                                                        <label class="form-check-label" for="flexCheckDefaultpatente">
                                                            Patenté
                                                        </label>
                                                    </div>
                                                    <div class="form-check m-1 col-2 statusCenter">
                                                        <input class="form-check-input statusCenter" type="radio" value="5" id="flexCheckCheckedScolEtu" name="statusIndividu">
                                                        <label class="form-check-label" for="flexCheckCheckedScolEtu">
                                                            Scolaire/Etudiant
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-12 d-md-flex d-block">
                                                    <div class="form-check m-1 col-2  ">
                                                        <input class="form-check-input" type="radio" value="6" id="flexCheckCheckedDemEmploi" checked name="statusIndividu">
                                                        <label class="form-check-label m-auto " for="flexCheckCheckedDemEmploi">
                                                            Demandeur d'emploi
                                                        </label>
                                                    </div>
                                                    <div class="form-check m-1 col-2 statusCenter">
                                                        <input class="form-check-input" type="radio" value="7" id="flexCheckCheckedChomage" checked name="statusIndividu">
                                                        <label class="form-check-label" for="flexCheckCheckedChomage">
                                                            Indemnité de chômage
                                                        </label>
                                                    </div>
                                                    <div class="col-12 col-md-6  d-md-flex d-block">
                                                        <div class="col-12 col-md-3 ">
                                                            <label for="periodeDeChomageDeb" class="form-label alignementlabelStatu">
                                                                <font style="vertical-align: inherit;">
                                                                    <font style="vertical-align: inherit;">pour la periode : du</font>
                                                                </font>
                                                            </label>
                                                        </div>
                                                        <div class="col-12 col-md-3">
                                                            <input type="date" class="form-control " id="periodeDeChomageDeb" name="periodeDeChomageDeb">
                                                        </div>
                                                        <div class="col-12 col-md-3 text-center">
                                                            <label for="periodeDeChomageFin" class="form-label alignementlabelStatu ">
                                                                <font style="vertical-align: inherit;">
                                                                    <font style="vertical-align: inherit;">à</font>
                                                                </font>
                                                            </label>
                                                        </div>
                                                        <div class="col-12 col-md-3">
                                                            <input type="date" class="form-control " id="periodeDeChomageFin" name="periodeDeChomageFin">
                                                        </div>
                                                        <div class="invalid-feedback">Remplissez ce champ
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Fin du troisième paragraphe  -->

                                            <!-- Couverture social du candidat -->
                                            <!-- quatrième paragraphe  -->

                                            <h6 class="twoBoxe text-uppercase">couverture sociale</h6>
                                            <div class="d-md-flex d-block ">
                                                <div class="form-check m-1">
                                                    <input class="form-check-input" type="checkbox" value="1" id="flexCheckDefaultCAFAT">
                                                    <label class="form-check-label" for="flexCheckDefaultCAFAT">
                                                        CAFAT
                                                    </label>
                                                </div>
                                                <div class="form-check m-1">
                                                    <input class="form-check-input" type="checkbox" value="2" id="flexCheckCheckedAideMedical" checked>
                                                    <label class="form-check-label" for="flexCheckCheckedAideMedical">
                                                        Aide-médicale
                                                    </label>
                                                </div>
                                                <div class="form-check m-1">
                                                    <input class="form-check-input" type="checkbox" value="3" id="flexCheckDefaultHandicap">
                                                    <label class="form-check-label" for="flexCheckDefaultHandicap">
                                                        Reconnaissance Traveilleur Handicapé
                                                    </label>
                                                </div>
                                            </div>
                                            <!-- FIN quatrième paragraphe  -->
                                            <!-- Autre informations du candidat -->
                                            <!-- cinquième paragraphe  -->
                                            <div class="col-md-3 col-12 d-md-flex d-block">
                                                <label for="periodeDeChomageDeb" class="form-label alignementlabelStatu statusCenter">
                                                    <font style="vertical-align: inherit;">
                                                        <font style="vertical-align: inherit;">Inscription demandeur d'emploi : </font>
                                                    </font>
                                                </label>
                                            </div>
                                            <div class="d-md-flex d-block col-md-2 col-12">
                                                <div class="form-check m-1 col-6 statusCenter">
                                                    <input class="form-check-input" type="radio" value="1" id="InscriptDemandeurOui" name="autreInformationInscriptonDemandeur">
                                                    <label class="form-check-label" for="InscriptDemandeurOui">
                                                        Oui
                                                    </label>
                                                </div>
                                                <div class="form-check m-1 col-6 statusCenter">
                                                    <input class="form-check-input" type="radio" value="2" id="InscriptDemandeurnon" name="autreInformationInscriptonDemandeur">
                                                    <label class="form-check-label" for="InscriptDemandeurnon">
                                                        Non
                                                    </label>
                                                </div>
                                            </div>
                                            <div class=" col-md-6 col-12">
                                                <div class="col-md-6 col-12 d-md-flex d-block w-auto p-2 ">
                                                    <label for="numDemEmploi" class="form-label autreInformationCandidat" style="margin-right: 5px !important;">
                                                        <font style="vertical-align: inherit;">
                                                            <font style="vertical-align: inherit;">Si oui n° :</font>
                                                        </font>
                                                    </label>
                                                    <div class="col">
                                                        <input type="text" class="form-control" id="numDemEmploi" placeholder="" value="" >
                                                        <div class="invalid-feedback">Remplissez ce champ
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-12 d-md-flex d-block">
                                                <label for="periodeDeChomageDeb" class="form-label alignementlabelStatu statusCenter">
                                                    <font style="vertical-align: inherit;">
                                                        <font style="vertical-align: inherit;">Permis de conduire :</font>
                                                    </font>
                                                </label>
                                            </div>
                                            <div class="d-md-flex d-block col-md-2 col-12">
                                                <div class="form-check m-1 col-6 statusCenter">
                                                    <input class="form-check-input" type="radio" value="1" id="permisOui" name="autreInformationPermis">
                                                    <label class="form-check-label" for="permisOui">
                                                        Oui
                                                    </label>
                                                </div>
                                                <div class="form-check m-1 col-6 statusCenter">
                                                    <input class="form-check-input" type="radio" value="2" id="permisnon" name="autreInformationPermis">
                                                    <label class="form-check-label" for="permisnon">
                                                        Non
                                                    </label>
                                                </div>
                                            </div>
                                            <div class=" col-md-6 col-12">
                                                <div class="col-md-6 col-12 d-md-flex d-block w-auto p-2 ">
                                                    <label for="numDemEmploi" class="form-label autreInformationCandidat" style="margin-right: 5px !important;">
                                                        <font style="vertical-align: inherit;">
                                                            <font style="vertical-align: inherit;">Lesquels : </font>
                                                        </font>
                                                    </label>
                                                    <div class="col">
                                                        <input type="text" class="form-control" id="numDemEmploi" placeholder="" value="">
                                                        <div class="invalid-feedback">Remplissez ce champ
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- FIN cinquième paragraphe  -->
                                        </div>
                                </div>
                            </div>
                            <div class="container m-auto">
                                <div class="col-12 border p-2 mt-1">
                                    <h6 class="twoBoxe text-uppercase"> <strong>Parcours scolaire formations </strong></h6>
                                    <div class="col-md-6 col-10 m-auto d-md-flex d-block w-auto p-2 ">
                                        <label for="dernierClasseFormation" class="form-label autreInformationCandidat" style="margin-right: 5px !important;">
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;">Dérnière classe ou dernière formations suivie (date)</font>
                                            </font>
                                        </label>
                                        <div class="col w-auto">
                                            <input type="text" class="form-control" id="dernierClasseFormation" placeholder="" value="" ="">
                                            <div class="invalid-feedback">Remplissez ce champ
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-12">
                                        <label for="diplome" class="form-label autreInformationCandidat" style="margin-right: 5px !important;">
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;">Si vous avez des diplômes, lesquels:</font>
                                            </font>
                                        </label>
                                        <div class="col w-auto">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered ">
                                                    <thead>
                                                        <tr>
                                                            <th>Année(s)</th>
                                                            <th>Nom du diplôme</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="invalid-feedback">Remplissez ce champ
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="container m-auto">
                                <div class="col-12 border p-2 mt-2">
                                    <h6 class="twoBoxe text-uppercase"><strong> Parcours professionnel : experience et stage</strong></h6>
                                    <div class="col-12 col-md-12">
                                        <div class="col w-auto">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered ">
                                                    <thead>
                                                        <tr>
                                                            <th>Année(s)</th>
                                                            <th>Métier</th>
                                                            <th>Entreprise</th>
                                                            <th>Durée</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="invalid-feedback">Remplissez ce champ
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="container m-auto">
                                <div class="col-12 border p-2 mt-2">
                                    <h6 class="twoBoxe text-uppercase"><strong>votre demande giep-nc</strong></h6>
                                    <div class="col-md-6 col-10 m-auto d-md-flex d-block w-auto p-2 ">
                                        <label for="dernierClasseFormation" class="form-label autreInformationCandidat mb-0" style="margin-right: 5px !important; vertical-align: text-bottom;">
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;">M'informer sur</font>
                                            </font>
                                        </label>
                                        <div class="d-md-flex d-block ">
                                            <div class="form-check m-1">
                                                <input class="form-check-input" type="checkbox" value="1" id="flexCheckDefaultmetier">
                                                <label class="form-check-label" for="flexCheckDefaultmetier">
                                                    Les métiers
                                                </label>
                                            </div>
                                            <div class="form-check m-1">
                                                <input class="form-check-input" type="checkbox" value="2" id="flexCheckCheckedFormationPoursuite" checked>
                                                <label class="form-check-label" for="flexCheckCheckedFormationPoursuite">
                                                    Les formations ou poursuite d'études
                                                </label>
                                            </div>
                                            <div class="form-check m-1">
                                                <input class="form-check-input" type="checkbox" value="3" id="flexCheckDefaultVAEInformation">
                                                <label class="form-check-label" for="flexCheckDefaultVAEInformation">
                                                    La VAE
                                                </label>
                                            </div>
                                            <div class="form-check m-1">
                                                <input class="form-check-input" type="checkbox" value="4" id="flexCheckCheckedAideFinaciere" checked>
                                                <label class="form-check-label" for="flexCheckCheckedAideFinaciere">
                                                    Les aides finacières
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-10 m-auto d-md-flex d-block w-auto p-2 ">
                                        <label for="dernierClasseFormation" class="form-label autreInformationCandidat mb-0" style="margin-right: 5px !important; vertical-align: text-bottom;">
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;">Maccompagner pour : </font>
                                            </font>
                                        </label>
                                        <div class="d-md-flex d-block ">
                                            <div class="form-check m-1">
                                                <input class="form-check-input" type="checkbox" value="1" id="flexCheckDefaultChangerDeMetier">
                                                <label class="form-check-label" for="flexCheckDefaultChangerDeMetier">
                                                    Changer de métiers
                                                </label>
                                            </div>
                                            <div class="form-check m-1">
                                                <input class="form-check-input" type="checkbox" value="2" id="flexCheckCheckedConstruireMonProjetPro" checked>
                                                <label class="form-check-label" for="flexCheckCheckedConstruireMonProjetPro">
                                                    Construire mon projet professionnel
                                                </label>
                                            </div>
                                            <div class="form-check m-1">
                                                <input class="form-check-input" type="checkbox" value="3" id="flexCheckDefaultChercherEmploiStage">
                                                <label class="form-check-label" for="flexCheckDefaultChercherEmploiStage">
                                                    Chercher un emploi/stage
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12 m-auto d-md-flex d-block w-auto p-2 h-10">
                                        <label for="dernierClasseFormation" class="form-label autreInformationCandidat mb-0" style="margin-right: 5px !important; vertical-align: text-bottom; width:25%;">
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;">Autre demandes : </font>
                                            </font>
                                        </label>
                                        <input type="text" class="form-control" id="numDemEmploi" placeholder="" value="" >
                                    </div>
                                </div>
                            </div>
                            <hr class="my-4">
                            <button class="w-100 btn btn-primary btn-lg" type="submit">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">Rajouter l'individu</font>
                                </font>
                            </button>
                            </form>
                        </div>
                        <div class="card-footer">
                            {{ __('Pour suivi du candidat') }}
                        </div>
                    </div>
            </div>
        </div>
        </section>
    </div>
</div>
</div>
</div>
@endsection