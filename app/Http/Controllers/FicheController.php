<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Fiche;
use App\Models\FicheTypeAtelier;
use App\Models\FicheTypePaio;
use App\Models\FicheTypeSpip;
use App\Models\FicheTypeSpot;
use App\Models\FicheTypeVae;
use App\Models\Individu;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
                        $ficheindividuNotExiste = "la fiche demandé dans le navigateur n'existe pas";
                        return view('404.404', compact('ficheindividuNotExiste'));
                    } elseif ("$fiche->iopa_individu_id" !== $id) {
                        // fiche call in URL doesn't exist
                        $ficheindividuNotExiste = "la fiche demandé dans le navigateur n'est plus la même";
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
                        $ficheindividuNotExiste = "la fiche paio demandé à une erreur";
                        return view('404.404', compact('ficheindividuNotExiste'));
                    }elseif ($fichePaios->count() == 0) {
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
                        $ficheindividuNotExiste = "la fiche vae demandé à une erreur";
                        return view('404.404', compact('ficheindividuNotExiste'));
                    }elseif ($ficheVaes->count() == 0) {
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
                        $ficheindividuNotExiste = "la fiche spip demandé à une erreur";
                        return view('404.404', compact('ficheindividuNotExiste'));
                    }elseif ($ficheSpips->count() == 0) {
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
                        $ficheindividuNotExiste = "la fiche spot demandé à une erreur";
                        return view('404.404', compact('ficheindividuNotExiste'));
                    }elseif ($ficheSpots->count() == 0) {
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
                        $ficheindividuNotExiste = "la fiche spot demandé à une erreur";
                        return view('404.404', compact('ficheindividuNotExiste'));
                    }elseif ($ficheAteliers->count() == 0) {
                        $ficheAteliers = "Aucune fiche Atelier";
                    } else {
                        $ficheAteliers;
                    }
                } catch (QueryException $exception) {
                    dd($exception->getMessage());
                }

                //ID de l'individu par rapport à ID de la fiche
                try {
                    $individu = Individu::where('iopa_individu_id', '=', $fiche->iopa_individu_id)->get();
                    // dd($individu);
                    if ($individu === null) {
                        // Si la variable individu egal null alors la variable egale erreur
                        $individu = "erreur";
                    }
                    if ($individu === "erreur") {
                        // individu call in URL doesn't exist   
                        $ficheindividuNotExiste = "l'individu demandé n'existe pas";
                        return view('404.404', compact('ficheindividuNotExiste'));
                    }elseif ($fiche->iopa_individu_id !== $individu->first()->iopa_individu_id) {
                        // fiche de l'utilisateur doesn't exist
                        $ficheindividuNotExiste = "la fiche de l'utilisateur n'existe pas";
                        return view('404.404', compact('ficheindividuNotExiste'));
                    }else {
                        $individu;
                    }
                } catch (QueryException $exception) {
                    dd($exception->getMessage());
                }
                // dd($individu->first()->dateofBirth_individu);
                if ($individu->first()->dateofBirth_individu !==  "non-définie") {                    
                    $parseCarbone = Carbon::parse($individu->first()->dateofBirth_individu);
                    // dd($parseCarbone->age);
                    // dd($this->dateofBirth_individu->age);
                    $parseCarboneSolo = $parseCarbone->age; 
                }else {
                    $parseCarboneSolo =  "Définir la date de naissance";
                }
                // dd($parseCarbone);
                return view('fiche.show',  compact('fiche', 'agent', 'individu', 'fichePaios', 'ficheVaes', 'ficheSpips','ficheSpots','ficheAteliers','parseCarboneSolo'));
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
    public function updateIndividu(Request $request,$id)
    {
        // dd();
        $name_individu = $request->input('name_individu');
        $lastName_individu = $request->input('lastName_individu');
        $portable_individu = $request->input('portable_individu');
        $dateofBirth_individu = $request->input('dateofBirth_individu');
        $adresse_individu = $request->input('adresse_individu');
        $deuxiemeAdresse_individu = $request->input('deuxiemeAdresse_individu');

        Individu::where('iopa_individu_id',$id)->update(
            ['name_individu'=>$name_individu,
            'lastName_individu'=>$lastName_individu,
            'portable_individu'=>$portable_individu,
            'dateofBirth_individu'=>$dateofBirth_individu,
            'adresse_individu'=>$adresse_individu,
            'deuxiemeAdresse_individu'=>$deuxiemeAdresse_individu
        ]);
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
