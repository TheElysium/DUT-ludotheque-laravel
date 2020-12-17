<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use App\Models\Editeur;
use App\Models\Jeu;
use App\Models\Mecanique;
use App\Models\Theme;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class JeuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($sort=null)
    {
        $filter = null;
        if($sort !== null){
            if($sort){
                $jeux = Jeu::all()->sortBy('nom');
            } else{
                $jeux = Jeu::all()->sortByDesc('nom');
            }
            $sort = !$sort;
            $filter = true;
        } else{
            $jeux = Jeu::all();
            $sort = true;
        }
        return view('jeux.index', ['jeux' => $jeux, 'sort' => intval($sort), 'filter' => $filter,'route'=>'jeux.index']);
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
        $mecaniques = Mecanique::all();
        return view('jeux.create', ["editeurs"=>$editeurs, "themes"=>$themes, 'mecaniques'=>$mecaniques]);
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
            return redirect()->route('jeux.index');
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

        $nom_image = time().'.'.$request->file('url_media')->getClientOriginalExtension();
        $request->file('url_media')->move(public_path('images'), $nom_image);
        $jeu->url_media = $nom_image;

        $jeu->age = $request->age;
        $jeu->nombre_joueurs = $request->nombre_joueurs;
        $jeu->categorie = $request->categorie;
        $jeu->duree = $request->duree;

        $jeu->user_id = Auth::id();
        $jeu->theme_id = $request->theme;
        $jeu->editeur_id = $request->editeur;

        $jeu->save();

        $jeu->mecaniques()->sync($request->input('mecaniques'));

        $request->session()->flash('message.level','success'); # le niveau du message d'alerte, valeurs possibles : danger ou success
        $request->session()->flash('message.content',"Jeu ajouté avec succès !");
        return redirect()->route('jeux.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jeu = Jeu::find($id);
        $commentaires = Commentaire::all()->where('jeu_id', '=', $id);
        $note_moyenne = Commentaire::all()->where('jeu_id', '=', $id)->avg('note');
        $note_minimum = Commentaire::all()->where('jeu_id', '=', $id)->min('note');
        $note_maximum = Commentaire::all()->where('jeu_id', '=', $id)->max('note');
        $nombres_commentaires = Commentaire::all()->where('jeu_id', '=', $id)->count();
        $nombres_commentaires_ttl = Commentaire::all()->count();


        $notes_moyennes_ttl = DB::table('commentaires')
            ->join('jeux', 'commentaires.jeu_id', '=', 'jeux.id')
            ->where('jeux.theme_id', '=', $jeu->theme_id)
            ->avg('note');

        $classement = 1;
        foreach ((array)$notes_moyennes_ttl as $n){
            if ($note_moyenne>=$n){
                break;
            }
            $classement++;
        }


        $prix_moyen = DB::table('achats')->where('jeu_id', '=', $jeu->id)->avg('prix');
        $prix_minimum = DB::table('achats')->where('jeu_id', '=', $jeu->id)->min('prix');
        $prix_maximum = DB::table('achats')->where('jeu_id', '=', $jeu->id)->max('prix');
        $nombre_users = DB::table('achats')->where('jeu_id', '=', $jeu->id)->count();
        $user_total_site = User::all()->count();


        return view('jeux.show',['jeu' => $jeu, 'commentaires' => $commentaires,
            'note_moyenne' => $note_moyenne, 'note_minimum' => $note_minimum, 'note_maximum' => $note_maximum,
            'nombres_commentaires' => $nombres_commentaires, 'nombres_commentaires_ttl' => $nombres_commentaires_ttl, 'classement' => $classement,
            'prix_moyen' => $prix_moyen, 'prix_minimum' => $prix_minimum, 'prix_maximum' => $prix_maximum, 'nombre_users' => $nombre_users,
            'user_total_site' => $user_total_site
            ]);

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

    public function regles($id){
        $jeux = Jeu::all();
        $jeu = $jeux->find($id);
        return view('jeux.regles', ['jeu' => $jeu]);

    }

    public function promptdelete(Request $request) {
        if (!Auth::check()) {
            $request->session()->flash('message.level','danger');
            $request->session()->flash('message.content',"Vous n'êtes pas connecté !");
            return redirect()->route('auth.login');
        }
        $jeux = DB::table('achats')->join('jeux', 'jeux.id', '=', 'achats.jeu_id')->where('achats.user_id', Auth::id())->get();
        if ($jeux->count() == 0) {
            $request->session()->flash('message.level','danger');
            $request->session()->flash('message.content',"Vous n'avez aucun jeux !");
            return redirect()->route('user.show');
        }
        return view('user.delete', ['jeux' => $jeux]);
    }

    public function delete(Request $request) {
        if (!Auth::check()) {
            $request->session()->flash('message.level','danger');
            $request->session()->flash('message.content',"Vous n'êtes pas connecté !");
            return redirect()->route('auth.login');
        }
        $jeu = Jeu::find($request->jeu);
        if ($jeu == null) {
            $request->session()->flash('message.level','danger');
            $request->session()->flash('message.content',"Ce jeu n'existe pas !");
            return redirect()->route('user.show');
        }
        $jeu->acheteurs()->detach(Auth::id());
        $request->session()->flash('message.level','sucess');
        $request->session()->flash('message.content',"Jeu supprimé avec succès !");
        return redirect()->route('user.show');
    }
}
