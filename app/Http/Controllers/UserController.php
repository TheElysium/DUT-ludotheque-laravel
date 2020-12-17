<?php

namespace App\Http\Controllers;

use App\Models\Editeur;
use App\Models\Jeu;
use App\Models\Theme;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jeux = Jeu::all();
        return view('user.ajoutJeux',['jeux'=>$jeux]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!Auth::check()){
            $request->session()->flash('message.level','danger'); # le niveau du message d'alerte, valeurs possibles : danger ou success
            $request->session()->flash('message.content',"Vous n'avez pas la permission d'ajouter un jeu à votre collection !"); #contenu du message d'alerte
            return redirect()->route('auth.login');
        }

        $request->validate(
            [
                'jeu_id' => 'required',
                'prix' => 'nullable|numeric',
                'lieu' => 'nullable',
                'date_achat' => 'date|required'
            ],
            [
                'jeu_id.required' => 'Le choix du jeu est requis',
                'prix.numeric' => 'La note doit être numérique',
                'date_achat.date' => 'Le format de la date est incorrect',
                'date_achat.required' => 'La date est obligatoire'
            ]
        );
        Log::info($request);
        $user = Auth::user();
        $user->ludo_perso()->attach($request->jeu_id, ['prix' => $request->prix, 'date_achat' => $request->date_achat, 'lieu' => $request->lieu]);
        $user->save();

        $request->session()->flash('message.level','success'); # le niveau du message d'alerte, valeurs possibles : danger ou success
        $request->session()->flash('message.content',"Jeu ajouté avec succès !");
        return redirect()->route('user.jeux');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('user.show',['user' => $user]);
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

    public function current()
    {
        if (Auth::check()) {
            return view('user.show', ["user" => Auth::user()]);
        }
        else
        {
            return redirect()->route('auth.login');
        }
    }


    public function jeux($sort=null){ // retourne la liste des jeux de l'utilisateur courant
        if (Auth::check()) {
            $jeux_achetes = DB::table('achats')->where('user_id','=',Auth::id())->get();
            $jeux_achetes_id = $jeux_achetes->pluck('jeu_id');

            $jeux = [];
            foreach ($jeux_achetes_id as $id){
                $jeux[] = Jeu::find($id);
            }

            $res = $jeux; // TODO : ré-implémenter la fonction de tri
            return view('user.jeux', ["user" => Auth::user(),'jeux'=> $res,'sort'=>$sort,'filter'=>null,'route'=>'user.jeux']);
        }
        else
        {
            return redirect()->route('auth.login');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        Auth::logout();

        return redirect('/');
    }
}
