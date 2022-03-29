<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Individu;
use Illuminate\Http\Request;

class CreateReservationController extends Controller
{
    
    public function autocomplete(Request $request)
    {

        if (session()->has('LoggedUser')) {
            # code...
            $agent = Agent::where("id", "=", session('LoggedUser'))->first();
            $data = [
                "LoggedUserInfo" => $agent,
            ];
        }
        # AJAX CODE AUTOCOMPLET AGENTS
        //Récupération de tout les agents disponible en fonction de la requête passer en ajax 
        $dataI = Individu::select('name_individu')
            ->where(function ($query) use ($request) {
                $query->where("name_individu", "LIKE", "%{$request->get('query')}%");
            })
            ->get();
        //Création d'un count de la requêt pour utiliser sur la valeur 0
        $dataCount = $dataI->count();
        //Si la requêt contient un tableau vide alors renvoie la chaine de caractére  "Aucune donnée"
        //Sinon crée une liuste en fonction de la requête envoyer .
        if ($dataCount === 0) {
            # code...
            $output = 'Aucune donnée';
        } else {
            $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
            foreach ($dataI  as $row) {
                $output .= '<li><a href="#"  onclick="set_idagents(' . $row->iopa_individu_id . ');"><span>' . $row->name_individu . '</span></a></li>';
            }
            $output .= '</ul>';
        }
        //Return la valeur en json pour ajax 
        return response()->json($output);
    }
    // public function autocomplete(Request $request)
    // {

    //     if (session()->has('LoggedUser')) {
    //         # code...
    //         $agent = Agent::where("id", "=", session('LoggedUser'))->first();
    //         $data = [
    //             "LoggedUserInfo" => $agent,
    //         ];
    //     }
    //     $agentsPoleService = $agent->poles_services_id;
    //     // dd($agentsPoleService);
    //     # AJAX CODE AUTOCOMPLET AGENTS
    //     //Récupération de tout les agents disponible en fonction de la requête passer en ajax 
    //     $data = Agent::select('name', 'first_name', 'id', 'poles_services_id')
    //         ->where('poles_services_id', '=', $agentsPoleService)
    //         ->where(function ($query) use ($request) {
    //             $query->where("name", "LIKE", "%{$request->get('query')}%")
    //                 ->orwhere('first_name', "LIKE", "%{$request->get('query')}%");
    //         })
    //         ->get();

    //     // dd($agent->poles_services_id);
    //     //Création d'un count de la requêt pour utiliser sur la valeur 0
    //     $dataCount = $data->count();
    //     //Si la requêt contient un tableau vide alors renvoie la chaine de caractére  "Aucune donnée"
    //     //Sinon crée une liuste en fonction de la requête envoyer .
    //     if ($dataCount === 0) {
    //         # code...
    //         $output = 'Aucune donnée';
    //     } else {
    //         $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
    //         foreach ($data  as $row) {
    //             $output .= '<li><a href="#"  onclick="set_idagents(' . $row->id . ');"><span>' . $row->name . ' ' . $row->first_name . '</span></a></li>';
    //         }
    //         $output .= '</ul>';
    //     }
    //     //Return la valeur en json pour ajax 
    //     return response()->json($output);
    // }
}
