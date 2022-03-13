<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\AgentsHasApplication;
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
                        $autorisation = AgentsHasApplication::where('agents_id', '=', $agent->id)->where('applications_id', '=', 2)->get();
                        $request->session()->put('LoggedUser', $agent->id, $autorisation);
                        $request->session()->put('LoggedUserAuth', $autorisation);
                    } catch (QueryException $exception) {
                        dd($exception->getMessage());
                    }
                    return redirect('/')->with("success", "Bonjour agent : $agent->name $agent->first_name");
                } else {
                    return back()->with('fail', 'Mot de passe incorrect');
                }
            }
        } else {
            return back()->with('fail', 'Aucun compte trouvé pour cette adresse e-mail');
        }
    }
}
