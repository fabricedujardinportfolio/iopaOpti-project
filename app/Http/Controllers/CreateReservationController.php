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
        $dataI = Individu::select('name_individu','iopa_individu_id')
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
            $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
                $output .= '<li>Aucune donnée trouver pour : <strong>'.$request->get('query').'</strong> ,rajouter cette <a href="addCandidate/'.$request->get('query').'"><span>Individu</span></a></li>';
            $output .= '</ul>';
        } else {
            $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
            foreach ($dataI  as $row) {
                $output .= '<li><a href="fiche/'.$row->iopa_individu_id.'"  onclick="set_idindividu(' . $row->iopa_individu_id . ');"><span>' . $row->name_individu . '</span></a></li>';
            }
            $output .= '</ul>';
        }
        //Return la valeur en json pour ajax 
        return response()->json($output);
    }
}
