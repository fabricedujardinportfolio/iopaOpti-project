<?php

namespace App\Http\Controllers;

use Response;
use Carbon\Carbon;
use App\Models\Agent;
use App\Models\Fiche;
use App\Models\Diplome;
use App\Models\Experience;
use App\Models\Individu;
use Illuminate\Support\Str;
use App\Models\FicheTypeVae;
use Illuminate\Http\Request;
use App\Models\FicheTypePaio;
use App\Models\FicheTypeSpip;
use App\Models\FicheTypeSpot;
use App\Models\FicheTypeAtelier;
use App\Models\Permi;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;

class FicheController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fiches = Fiche::all();
        dd($fiches);
        return view('post.index');
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Fiche PAIO

        if (session()->has('LoggedUser')) {
            try {

                if (session()->has('LoggedUser')) {
                    try {
                        $agent = Agent::where("id", "=", session('LoggedUser'))->first();
                        // $autorisationAgent = Agent::select('role_ressource')->where('id', '=', $agent->id)->get();
                        $data = [
                            "LoggedUserInfo" => $agent,
                            // "LoggedUserAuth" => $autorisationAgent,
                        ];
                    } catch (QueryException $exception) {
                        dd($exception->getMessage());
                    }
                }

                //Fiche Master
                try {
                    $fiche = Fiche::where('iopa_individu_id', '=', $id)->first();
                    // dd($fiche);
                    if ($fiche === null) {
                        // Si la variable fiche egal null alors la variable egale erreur
                        $fiche = "erreur";
                    }
                    if ($fiche === "erreur") {
                        // fiche call in URL doesn't exist   
                        $ficheindividuNotExiste = "la fiche demand?? dans le navigateur n'existe pas";
                        return view('404.404', compact('ficheindividuNotExiste'));
                    } elseif ("$fiche->iopa_individu_id" !== $id) {
                        // fiche call in URL doesn't exist
                        $ficheindividuNotExiste = "la fiche demand?? dans le navigateur n'est plus la m??me";
                        return view('404.404', compact('ficheindividuNotExiste'));
                    }
                } catch (QueryException $exception) {
                    dd($exception->getMessage());
                }

                //Fiche PAIO
                try {
                    $fichePaios = FicheTypePaio::select('*')->where('iopa_fiche_id', '=', $fiche->iopa_fiche_id)->get();
                    // dd($fichePaios);
                    if ($fichePaios === null) {
                        // Si la variable fichePaios egal null alors la variable egale erreur
                        $fichePaios = "erreur";
                    }
                    if ($fichePaios === "erreur") {
                        // fichePaios call in URL doesn't exist   
                        $ficheindividuNotExiste = "la fiche paio demand?? ?? une erreur";
                        return view('404.404', compact('ficheindividuNotExiste'));
                    } elseif ($fichePaios->count() == 0) {
                        $fichePaios = "Aucune fiche Paio";
                    } else {
                        $fichePaios;
                    }
                } catch (QueryException $exception) {
                    dd($exception->getMessage());
                }

                // Fiche VAE
                try {

                    $ficheVaes = FicheTypeVae::select('*')->where('iopa_fiche_id', '=', $fiche->iopa_fiche_id)->paginate(2, ["*"], "pageVae");
                    if ($ficheVaes === null) {
                        // Si la variable ficheVaes egal null alors la variable egale erreur
                        $ficheVaes = "erreur";
                    }
                    if ($ficheVaes === "erreur") {
                        // ficheVaes call in URL doesn't exist   
                        $ficheindividuNotExiste = "la fiche vae demand?? ?? une erreur";
                        return view('404.404', compact('ficheindividuNotExiste'));
                    } elseif ($ficheVaes->count() == 0) {
                        $ficheVaes = "Aucune fiche Vae";
                    } else {
                        $ficheVaes;
                    }
                } catch (QueryException $exception) {
                    dd($exception->getMessage());
                }
                // Fiche spip
                try {
                    $ficheSpips = FicheTypeSpip::select('*')->where('iopa_fiche_id', '=', $fiche->iopa_fiche_id)->get();
                    // dd($ficheSpips);
                    if ($ficheSpips === null) {
                        // Si la variable ficheSpips egal null alors la variable egale erreur
                        $ficheSpips = "erreur";
                    }
                    if ($ficheSpips === "erreur") {
                        // ficheSpips call in URL doesn't exist   
                        $ficheindividuNotExiste = "la fiche spip demand?? ?? une erreur";
                        return view('404.404', compact('ficheindividuNotExiste'));
                    } elseif ($ficheSpips->count() == 0) {
                        $ficheSpips = "Aucune fiche Spip";
                    } else {
                        $ficheSpips;
                    }
                } catch (QueryException $exception) {
                    dd($exception->getMessage());
                }
                // Fiche spot
                try {
                    $ficheSpots = FicheTypeSpot::select('*')->where('iopa_fiche_id', '=', $fiche->iopa_fiche_id)->paginate(2, ["*"], "pageSpot");
                    // $ficheSpots->setPageName('pageSpot');                 
                    if ($ficheSpots === null) {
                        // Si la variable ficheSpots egal null alors la variable egale erreur
                        $ficheSpots = "erreur";
                    }
                    if ($ficheSpots === "erreur") {
                        // ficheSpots call in URL doesn't exist   
                        $ficheindividuNotExiste = "la fiche spot demand?? ?? une erreur";
                        return view('404.404', compact('ficheindividuNotExiste'));
                    } elseif ($ficheSpots->count() == 0) {
                        $ficheSpots = "Aucune fiche Spot";
                    } else {
                        $ficheSpots;
                    }
                } catch (QueryException $exception) {
                    dd($exception->getMessage());
                }
                // Fiche atelier
                try {
                    $ficheAteliers = FicheTypeAtelier::select('*')->where('iopa_fiche_id', '=', $fiche->iopa_fiche_id)->paginate(2, ["*"], "pageAtelier");
                    // $ficheSpots->setPageName('pageSpot');                 
                    if ($ficheAteliers === null) {
                        // Si la variable ficheSpots egal null alors la variable egale erreur
                        $ficheAteliers = "erreur";
                    }
                    if ($ficheAteliers === "erreur") {
                        // ficheAteliers call in URL doesn't exist   
                        $ficheindividuNotExiste = "la fiche spot demand?? ?? une erreur";
                        return view('404.404', compact('ficheindividuNotExiste'));
                    } elseif ($ficheAteliers->count() == 0) {
                        $ficheAteliers = "Aucune fiche Atelier";
                    } else {
                        $ficheAteliers;
                    }
                } catch (QueryException $exception) {
                    dd($exception->getMessage());
                }

                //ID de l'individu par rapport ?? ID de la fiche
                try {
                    $individu = Individu::where('iopa_individu_id', '=', $fiche->iopa_individu_id)->get();
                    // dd($individu);
                    if ($individu === null) {
                        // Si la variable individu egal null alors la variable egale erreur
                        $individu = "erreur";
                    }
                    if ($individu === "erreur") {
                        // individu call in URL doesn't exist   
                        $ficheindividuNotExiste = "l'individu demand?? n'existe pas";
                        return view('404.404', compact('ficheindividuNotExiste'));
                    } elseif ($fiche->iopa_individu_id !== $individu->first()->iopa_individu_id) {
                        // fiche de l'utilisateur doesn't exist
                        $ficheindividuNotExiste = "la fiche de l'utilisateur n'existe pas";
                        return view('404.404', compact('ficheindividuNotExiste'));
                    } else {
                        $individu;
                    }
                } catch (QueryException $exception) {
                    dd($exception->getMessage());
                }

                //ID des permis par rapport ?? ID de l'individu
                try {
                    $iopa_individu_id = $individu->first()->iopa_individu_id;
                    $permis = Permi::where('iopa_individu_id', '=', $iopa_individu_id)->paginate(4, ["*"], "pagepermisIndividu$iopa_individu_id");
                    // dd($diplomes);
                    if ($permis === null) {
                        // Si la variable individu egal null alors la variable egale erreur
                        $permis = "erreur";                    
                    }
                    if ($permis === "erreur") {
                        // individu call in URL doesn't exist   
                        $ficheindividuNotExiste = "les permis de l'individu demand?? n'existe pas";
                        return view('404.404', compact('ficheindividuNotExiste'));
                    } elseif ($permis->count() == 0) {
                        $permis = "Aucun permi ?";
                        // dd($permis);
                    } elseif ($fiche->iopa_individu_id !== $permis->first()->iopa_individu_id) {
                        // fiche de l'utilisateur doesn't exist
                        $ficheindividuNotExiste = "les dipl??mes de l'individu n'existe pas";
                        return view('404.404', compact('ficheindividuNotExiste'));
                    } else {
                        $permis;
                    }
                    // dd($diplomes);
                } catch (QueryException $exception) {
                    dd($exception->getMessage());
                }

                //ID des dipl??me par rapport ?? ID de l'individu
                try {
                    $name = $individu->first()->name_individu;
                    // dd($name);
                    $diplomes = diplome::where('iopa_individu_id', '=', $fiche->iopa_individu_id)->paginate(4, ["*"], "pagediplomes$name");
                    // dd($diplomes);
                    if ($diplomes === null) {
                        // Si la variable individu egal null alors la variable egale erreur
                        $diplomes = "erreur";
                    }
                    if ($diplomes === "erreur") {
                        // individu call in URL doesn't exist   
                        $ficheindividuNotExiste = "les dipl??mes de l'individu demand?? n'existe pas";
                        return view('404.404', compact('ficheindividuNotExiste'));
                    } elseif ($diplomes->count() == 0) {
                        $diplomes = "Aucun dipl??me ?";
                    } elseif ($fiche->iopa_individu_id !== $diplomes->first()->iopa_individu_id) {
                        // fiche de l'utilisateur doesn't exist
                        $ficheindividuNotExiste = "les dipl??mes de l'individu n'existe pas";
                        return view('404.404', compact('ficheindividuNotExiste'));
                    } else {
                        $diplomes;
                    }
                    // dd($diplomes);
                } catch (QueryException $exception) {
                    dd($exception->getMessage());
                }

                //ID des exp??riences par rapport ?? ID de l'individu
                try {
                    $name = $individu->first()->name_individu;
                    // dd($name);
                    $experiences = Experience::where('iopa_individu_id', '=', $individu->first()->iopa_individu_id)->paginate(4, ["*"], "pageExperience$name");
                    // dd($diplomes);
                    if ($experiences === null) {
                        // Si la variable individu egal null alors la variable egale erreur
                        $experiences = "erreur";
                    }
                    if ($experiences === "erreur") {
                        // individu call in URL doesn't exist   
                        $ficheindividuNotExiste = "les experiences de l'individu demand?? n'existe pas";
                        return view('404.404', compact('ficheindividuNotExiste'));
                    } elseif ($experiences->count() == 0) {
                        $experiences = "Aucune experience ?";
                    } elseif ($fiche->iopa_individu_id !== $experiences->first()->iopa_individu_id) {
                        // fiche de l'utilisateur doesn't exist
                        $ficheindividuNotExiste = "les exp??riences de l'individu n'existe pas";
                        return view('404.404', compact('ficheindividuNotExiste'));
                    } else {
                        $experiences;
                    }
                    // dd($experiences);
                } catch (QueryException $exception) {
                    dd($exception->getMessage());
                }
                // dd($individu->first()->dateofBirth_individu);
                if ($individu->first()->dateofBirth_individu !==  "non-d??finie") {
                    $parseCarbone = Carbon::parse($individu->first()->dateofBirth_individu);
                    // dd($parseCarbone->age);
                    // dd($this->dateofBirth_individu->age);
                    $parseCarboneSolo = $parseCarbone->age;
                } else {
                    $parseCarboneSolo =  "D??finir la date de naissance";
                }
                // dd($individu->first()->portable_individu);
                return view('fiche.show',  compact('fiche', 'agent', 'individu', 'fichePaios', 'ficheVaes', 'ficheSpips', 'ficheSpots', 'ficheAteliers', 'parseCarboneSolo', 'diplomes','permis','experiences'));
            } catch (QueryException $exception) {
                return view('auth.login');
            }
        }
    }

    public function addFicheCandidat($id)
    {
        //    dd($id);
        //Fiche Master
        try {

            $fiche = FicheTypePaio::select('*')->where('iopa_fiche_id', '=', $id)->get();
            settype($id, "integer");
            // dd($id);
            if ($fiche->count() == 0 || $id !== $fiche->first()->iopa_fiche_type_paio_id) {
                // fiche call in URL doesn't exist
                // dd($fiche);
                $ficheindividuNotExiste = "la fiche demander dans le navigateur n'existe pas";
                return view('404.404', compact('ficheindividuNotExiste'));
            } else {
                $fiche;
            }
        } catch (QueryException $exception) {
            dd($exception->getMessage());
        }
        $fiche = Fiche::select('*')->where('iopa_fiche_id', '=', $id)->get();
        // dd($fiche);
        // dd($fiche->first()->iopa_individu_id);
        $individu = Individu::select('*')->where('iopa_individu_id', '=', $fiche->first()->iopa_individu_id);
        // dd($individu->first()->iopa_individu_id);
        if (session()->has('LoggedUser')) {
            try {
                $agent = Agent::where("id", "=", session('LoggedUser'))->first();
                // $autorisationAgent = Agent::select('role_ressource')->where('id', '=', $agent->id)->get();
                $data = [
                    "LoggedUserInfo" => $agent,
                    // "LoggedUserAuth" => $autorisationAgent,
                ];
            } catch (QueryException $exception) {
                dd($exception->getMessage());
            }
        }
        return view('fiche.ficheSuiviCandidat',  compact('fiche', 'agent', 'individu'));
    }
    public function updateIndividu(Request $request, $id)
    {
        
        // if ($request->has('profile') === true) {

        // // }
        //     dd($request);
        // dd($request->has('profile'));
        if ($request->has('profile') === true) {
            // dd($request->has('profile'));
            $name_individu = $request->input('name_individu');
            $lastName_individu = $request->input('lastName_individu');
            $maidenName_individu = $request->input('maidenName_individu');
            $portable_individu = $request->input('portable_individu');
            $dateofBirth_individu = $request->input('dateofBirth_individu');
            $adresse_individu = $request->input('adresse_individu');
            $deuxiemeAdresse_individu = $request->input('deuxiemeAdresse_individu');
            $sexe_individu = $request->input('sexe_individu');
            $communeBirth_individu = $request->input('communeBirth_individu');
            $familyStatus_individu = $request->input('familyStatus_individu');
            $dependentChildren_individu = $request->input('dependentChildren_individu');
            $commune_individu = $request->input('commune_individu');
            $quartier_individu = $request->input('quartier_individu');
            $postalAdresse_individu = $request->input('postalAdresse_individu');
            $email_individu = $request->input('email_individu');
            $situationProStatu_individu = $request->input('situationProStatu_individu');
            $chomageDemendeur_individu = $request->input('chomageDemendeur_individu');
            $chomageDemendeurPeriodeDeb_individu = $request->input('chomageDemendeurPeriodeDeb_individu');
            $chomageDemendeurPeriodeFin_individu = $request->input('chomageDemendeurPeriodeFin_individu');
            $validiterCafat_individu = $request->input('validiterCafat_individu');
            $validiterAidemedical_individu = $request->input('validiterAidemedical_individu');
            $travailleurHandicaper_individu = $request->input('travailleurHandicaper_individu');
            $formationNiveauScolaire_individu = $request->input('formationNiveauScolaire_individu');
            $inscriptionDemendeurEmploi_individu = $request->input('inscriptionDemendeurEmploi_individu');
            $permisDeConduire_individu = $request->input('permisDeConduire_individu');

            // restaure valeur default for chomageDemendeurPeriodeDeb_individu and chomageDemendeurPeriodeFin_individu
            if ($chomageDemendeur_individu === null) {
                $chomageDemendeur_individu = 'non-d??finie';
            }
            if ($chomageDemendeur_individu === 'non' || $chomageDemendeur_individu === 'non-d??finie') {
                $chomageDemendeurPeriodeDeb_individu = 'non-d??finie';
                $chomageDemendeurPeriodeFin_individu = 'non-d??finie';
            }
            if ($chomageDemendeurPeriodeDeb_individu === null || $chomageDemendeurPeriodeFin_individu === null) {
                $chomageDemendeurPeriodeDeb_individu = 'non-d??finie';
                $chomageDemendeurPeriodeFin_individu = 'non-d??finie';
            }
            // dd($chomageDemendeurPeriodeDeb_individu);

            Individu::where('iopa_individu_id', $id)->update(
                [
                    'name_individu' => $name_individu,
                    'lastName_individu' => $lastName_individu,
                    'maidenName_individu' => $maidenName_individu,
                    'portable_individu' => $portable_individu,
                    'dateofBirth_individu' => $dateofBirth_individu,
                    'adresse_individu' => $adresse_individu,
                    'deuxiemeAdresse_individu' => $deuxiemeAdresse_individu,
                    'sexe_individu' => $sexe_individu,
                    'communeBirth_individu' => $communeBirth_individu,
                    'familyStatus_individu' => $familyStatus_individu,
                    'dependentChildren_individu' => $dependentChildren_individu,
                    'commune_individu' => $commune_individu,
                    'quartier_individu' => $quartier_individu,
                    'postalAdresse_individu' => $postalAdresse_individu,
                    'email_individu' => $email_individu,
                    'situationProStatu_individu' => $situationProStatu_individu,
                    'chomageDemendeur_individu' => $chomageDemendeur_individu,
                    'chomageDemendeurPeriodeDeb_individu' => $chomageDemendeurPeriodeDeb_individu,
                    'chomageDemendeurPeriodeFin_individu' => $chomageDemendeurPeriodeFin_individu,
                    'validiterCafat_individu' => $validiterCafat_individu,
                    'validiterAidemedical_individu' => $validiterAidemedical_individu,
                    'travailleurHandicaper_individu' => $travailleurHandicaper_individu,
                    'formationNiveauScolaire_individu'=>$formationNiveauScolaire_individu,
                    'inscriptionDemendeurEmploi_individu'=>$inscriptionDemendeurEmploi_individu,
                    'permisDeConduire_individu'=>$permisDeConduire_individu
                ]
            );
                        
            return redirect()->to(app('url')->previous()."/#backSaveProfile");
        } elseif ($request->has('diplome') === true) {

            // dd($request);
            $diplome = new Diplome;
            $anneDiplome_individu = $request->input('anneDiplome_individu');
            $nameDiplome_individu = $request->input('nameDiplome_individu');
            $iopa_individu_id = $request->input('iopa_individu_id');

            $diplome->anneDiplome_individu = $anneDiplome_individu;
            $diplome->nameDiplome_individu = $nameDiplome_individu;
            $diplome->iopa_individu_id = $iopa_individu_id;
            
            $diplome->save();
            return redirect()->to(app('url')->previous()."/#statuProfiles");
        } elseif ($request->has('permis') === true) {

            // $iopa_individupermi_namesend = $request->input('iopa_individupermi_namesend');
            // dd($iopa_individupermi_namesend);
            $permis = new Permi;
            $iopa_individupermi_name = $request->input('iopa_individupermi_namesend');
            $iopa_individu_id = $request->input('iopa_individu_id');

            $permis->iopa_individupermi_name = $iopa_individupermi_name;
            $permis->iopa_individu_id = $iopa_individu_id;
            
            $permis->save();
            return redirect()->to(app('url')->previous()."/#topInfo");
        }elseif ($request->has('experience') === true) {

            // dd($request);
            $experience = new Experience;
            $iopa_experienceIndividu_annee = $request->input('iopa_experienceIndividu_annee');
            $iopa_experienceIndividu_metier = $request->input('iopa_experienceIndividu_metier');
            $iopa_experienceIndividu_entreprise = $request->input('iopa_experienceIndividu_entreprise');
            $iopa_experienceIndividu_duree = $request->input('iopa_experienceIndividu_duree');
            $iopa_individu_id = $request->input('iopa_individu_id');

            $experience->iopa_experienceIndividu_annee = $iopa_experienceIndividu_annee;
            $experience->iopa_experienceIndividu_metier = $iopa_experienceIndividu_metier;
            $experience->iopa_experienceIndividu_entreprise = $iopa_experienceIndividu_entreprise;
            $experience->iopa_experienceIndividu_duree = $iopa_experienceIndividu_duree;
            $experience->iopa_individu_id = $iopa_individu_id;
            
            $experience->save();
            return redirect()->to(app('url')->previous()."/#formDiplome");
        }else {
            $ficheindividuNotExiste = "Une erreur ces produite lors de l'enregistrement des donn??es du profile";
                        return view('404.404', compact('ficheindividuNotExiste'));
        }


        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    public function create()
    {
        return back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        // dd($id);
        // dd($request);
        $diplome = new Diplome;
        $anneDiplome_individu = $request->input('anneDiplome_individu');
        $nameDiplome_individu = $request->input('nameDiplome_individu');


        Diplome::where('iopa_IndividuDiplome_id', $id)->update(
            [
                'anneDiplome_individu' => $anneDiplome_individu,
                'nameDiplome_individu' => $nameDiplome_individu

            ]
        );  
        return redirect()->to(app('url')->previous()."/#statuProfiles");
        // return back('#formDiplome');
    }

    public function updatepermi(Request $request, $id)
    {
        //
        // dd($id);
        $iopa_individupermi_name = $request->input('iopa_individupermi_name');


        // dd($iopa_individupermi_name);
        Permi::where('iopa_individupermi_id', $id)->update(
            [
                'iopa_individupermi_name' => $iopa_individupermi_name,

            ]
        );  
        return redirect()->to(app('url')->previous()."/#topInfo");
        // return back('#formDiplome');
    }
    public function updateExper(Request $request, $id)
    {
        //
        // dd($id);
        $iopa_experienceIndividu_annee = $request->input('iopa_experienceIndividu_annee');
        $iopa_experienceIndividu_metier = $request->input('iopa_experienceIndividu_metier');
        $iopa_experienceIndividu_entreprise = $request->input('iopa_experienceIndividu_entreprise');
        $iopa_experienceIndividu_duree = $request->input('iopa_experienceIndividu_duree');
        $iopa_individu_id = $request->input('iopa_individu_id');
        // dd($iopa_individupermi_name);
        Experience::where('iopa_experienceIndividu_id', $id)->update(
            [
                'iopa_experienceIndividu_annee' => $iopa_experienceIndividu_annee,
                'iopa_experienceIndividu_metier'=>$iopa_experienceIndividu_metier,
                'iopa_experienceIndividu_entreprise'=>$iopa_experienceIndividu_entreprise,
                'iopa_experienceIndividu_duree'=>$iopa_experienceIndividu_duree,
                'iopa_individu_id'=>$iopa_individu_id

            ]
        );  
        return redirect()->to(app('url')->previous()."/#formDiplome");
        // return back('#formDiplome');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Diplome::where('iopa_IndividuDiplome_id', '=', $id)->delete();        
        return redirect()->to(app('url')->previous()."/#statuProfiles");
    }
    public function destroypermi($id)
    {
        Permi::where('iopa_individupermi_id', '=', $id)->delete();        
        return redirect()->to(app('url')->previous()."/#topInfo");
    }
    public function destroyexperience($id)
    {
        Experience::where('iopa_experienceIndividu_id', '=', $id)->delete();        
        return redirect()->to(app('url')->previous()."/#formDiplome");
    }
}
