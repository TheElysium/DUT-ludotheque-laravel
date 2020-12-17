<?php

namespace App\Http\Controllers;

use App\Models\Editeur;
use App\Models\Jeu;
use App\Models\Theme;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


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
        $validatedData = $request->validate([
            'lieu'=>'required',
            'date'=>'required',
            'prix'=>'required',
        ]);

        $jeu = Jeu::find($request->get('jeu'));
        $date = $request->get('date');
        $prix = $request->get('prix');

        if($jeu === null){
            $request->session()->flash('message.level','danger'); # le niveau du message d'alerte, valeurs possibles : danger ou success
            $request->session()->flash('message.content',"Erreur, jeu inconnu");
            return redirect()->route('user.jeux');
        }

        DB::table('achats')->insert(['user_id'=>Auth::id(),'jeu_id'=>$jeu->id,'date_achat'=>$date,'prix'=>$prix]);

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
}
