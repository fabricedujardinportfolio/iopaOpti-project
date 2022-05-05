<?php

namespace App\Http\Controllers;

use Illuminate\Support\Carbon;
use App\Models\Agent;
use App\Models\Fiche;
use App\Models\FicheTypePaio;
use App\Models\FicheTypeVae;
use App\Models\FichierPaio;
use App\Models\Individu;
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
                    $fiche = Fiche::where('iopa_fiche_id', '=', $id)->first();
                    if ("$fiche->iopa_fiche_id" !== $id) {
                        // fiche call in URL doesn't exist
                        // dd($fiche);
                        $ficheindividuNotExiste = "la fiche demander dans le navigateur n'existe pas";
                        return view('404.404', compact('ficheindividuNotExiste'));
                    }
                } catch (QueryException $exception) {
                    dd($exception->getMessage());
                }

                //Fiche PAIO
                try {
                    $fichePaios = FicheTypePaio::select('*')->where('iopa_fiche_id', '=', $id)->get();
                    // dd($fichePaios);
                    if ($fichePaios->count() == 0) {
                        $fichePaios = "Aucune fiche Paio";
                    } else {
                        $fichePaios;
                    }
                } catch (QueryException $exception) {
                    dd($exception->getMessage());
                }

                // Fiche VAE
                try {
                    $ficheVaes = FicheTypeVae::select('*')->where('iopa_fiche_id', '=', $id)->paginate(2);
                    if ($ficheVaes->count() == 0) {
                        $ficheVaes = "Aucune fiche Vae";
                    } else {
                        $ficheVaes;
                    }
                } catch (QueryException $exception) {
                    dd($exception->getMessage());
                }
                // Fiche spip
                // Fiche spot
                // Fiche atelier

                //ID de l'individu par rapport à ID de la fiche
                try {
                    $individu = Individu::where('iopa_individu_id', '=', $fiche->first()->iopa_individu_id)->first();
                    // dd($individu);
                    if ($fiche->first()->iopa_individu_id !== $individu->first()->iopa_individu_id) {
                        // fiche de l'utilisateur doesn't exist
                        $ficheindividuNotExiste = "la fiche de l'utilisateur n'existe pas";
                        return view('404.404', compact('ficheindividuNotExiste'));
                    }
                } catch (QueryException $exception) {
                    dd($exception->getMessage());
                }
                return view('fiche.show',  compact('fiche', 'agent', 'individu', 'fichePaios', 'ficheVaes'));
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
