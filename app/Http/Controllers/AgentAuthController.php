<?php

namespace App\Http\Controllers;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\Agent;
use App\Models\AgentsHasApplication;
use App\Models\Fiche;
use App\Models\Individu;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class AgentAuthController extends Controller
{
    //
    public function login()
    {
        return view('auth.login');
    }
    public function check(Request $request)
    {
        $request->validate([
            "email" => "required|email",
            "password" => "required|min:5|max:38"
        ]);
        $agent = Agent::where('email', '=', $request->email)->first();
        if ($agent) {
            if (($request->email) == $agent->email) {
                if (($request->password) == $agent->passwords) {
                    try {
                        $request->session()->put('LoggedUser', $agent->id);
                    } catch (QueryException $exception) {
                        dd($exception->getMessage());
                    }
                    return redirect('/')->with("success", "Bonjour agent : $agent->name $agent->first_name");
                } else {
                    return back()->with('fail', 'Aucun compte trouvé pour ce mot de passe');
                }
            }else {
                return back()->with('fail', 'Aucun compte trouvé pour cette adresse e-mail');
            }
        } else {
            return back()->with('fail', 'Aucun compte trouver');
        }
    }
    public function home(Request $request)
    {
        $mytime = Carbon::now();
        $nowdate = $mytime->toDateString();
        $userTimezone = date_default_timezone_set('Pacific/Noumea');
        $dateNo = date("d-m-Y H:m:s");
        $deadDate = date("10-04-2022");
        $dateNow = date('d-m-Y', strtotime($dateNo));
        $deDateNow = date('d-m-Y', strtotime($deadDate));
        // dd($deDateNow);
        try {
            $data = Agent::select('name', 'first_name', 'id')
                ->where("name", "LIKE", "%{$request->get('query')}%")
                ->orwhere('first_name', "LIKE", "%{$request->get('query')}%")
                ->get();
        } catch (QueryException $exception) {
            dd($exception->getMessage());
        }

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
        return view('home', compact('agent','dateNow', 'deDateNow'), $data);
    }
    public function read(Request $request)
    {
        $nameCandidate =0;
        // dd($nameCandidate);
        if (session()->has('LoggedUser')) {
            try {
                $agent = Agent::where("id", "=", session('LoggedUser'))->first();
                // $autorisationAgent = Agent::select('role_ressource')->where('id', '=', $agent->id)->get();
                $data = [
                    "LoggedUserInfo" => $agent,
                    // "LoggedUserAuth" => $autorisationAgent,
                ];  
                
                return view('addCandidate', compact('agent','nameCandidate'), $data);
            } catch (QueryException $exception) {
                return view('auth.login');
            }
        }
    }
    public function add(Request $request)
    {
        $individu = new Individu;
        $fiche = new Fiche;
        if (session()->has('LoggedUser')) {
            try {
                $agent = Agent::where("id", "=", session('LoggedUser'))->first();
                $data = [
                    "LoggedUserInfo" => $agent,
                ];
            } catch (QueryException $exception) {
                dd($exception->getMessage());
            }
        }
        $individu->name_individu = $request->name_individu;
        $individu->lastName_individu = $request->lastName_individu;
        $individu->save();
        $instanceIndividu = Individu::where('name_individu','=',$request->name_individu);
        $fiche->iopa_individu_id = $instanceIndividu->first()->iopa_individu_id;
        $fiche->agent_id = $agent->id;
        $fiche->save();
        return redirect()->route('showFiche', ['id' => $fiche->iopa_individu_id]);
        // dd($fiche);
    }
    
    public function addCandidate($nameCandidate)
    {
        // dd($nameCandidate);
        if (session()->has('LoggedUser')) {
            try {
                $agent = Agent::where("id", "=", session('LoggedUser'))->first();
                // $autorisationAgent = Agent::select('role_ressource')->where('id', '=', $agent->id)->get();
                $data = [
                    "LoggedUserInfo" => $agent,
                    // "LoggedUserAuth" => $autorisationAgent,
                ]; 
                return view('addCandidate', compact('agent','nameCandidate'), $data);
            } catch (QueryException $exception) {
                return view('auth.login');
            }
        }
    }
    public function logout()
    {
        if (session()->has('LoggedUser')) {
            session()->regenerate();
            session()->flush('LoggedUser');
            return redirect('login');
        }
    }
}
