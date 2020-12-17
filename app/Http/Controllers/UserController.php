<?php

namespace App\Http\Controllers;

use App\Models\Editeur;
use App\Models\Jeu;
use App\Models\Theme;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


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
        $editeurs = Editeur::all();
        $themes = Theme::all();
        return view('user.ajoutJeux',['editeurs'=>$editeurs,'themes'=>$themes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $jeu = new Jeu();

        if(!Auth::check()){
            $request->session()->flash('message.level','danger'); # le niveau du message d'alerte, valeurs possibles : danger ou success
            $request->session()->flash('message.content',"Vous n'avez pas la permission d'ajouter un jeu !"); #contenu du message d'alerte
            return redirect()->route('auth.login');
        }
        $validatedData = $request->validate([
            'nom' => 'required',
            'description' => 'required',
            'theme' => 'required',
            'editeur' => 'required',
        ]);


        $jeu->nom = $request->nom;
        $jeu->description = $request->description;
        $jeu->regles = $request->regles;
        $jeu->langue = $request->langue;
        $jeu->url_media = $request->url_media;
        $jeu->age = $request->age;
        $jeu->nombre_joueurs = $request->nombre_joueurs;
        $jeu->categorie = $request->categorie;
        $jeu->duree = $request->duree;

        $jeu->user_id = Auth::id();
        $jeu->theme_id = $request->theme;
        $jeu->editeur_id = $request->editeur;

        $jeu->save();

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
            $jeux = Jeu::all()->where('user_id','=',Auth::id());

            if($sort !== null){
                if($sort){
                    $res = $jeux->sortBy('nom');
                } else{
                    $res = $jeux->sortByDesc('nom');
                }
                $sort = !$sort;
            } else{
                $res = $jeux;
                $sort = true;
            }
            $res = $jeux->sortBy('nom');
            return view('user.jeux', ["user" => Auth::user(),'jeux'=> $res,'sort'=>$sort,'filter'=>null,'route'=>'user.jeux']);
        }
        else
        {
            return redirect()->route('auth.login');
        }
    }
}
