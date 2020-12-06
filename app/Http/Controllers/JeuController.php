<?php

namespace App\Http\Controllers;

use App\Models\Jeu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JeuController extends Controller
{



    /**
     * List All Jeu
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $jeux = Jeu::all();

        return view('jeu.index', ['jeux' =>$jeux]);
    }

    /**
     * Show Jeu.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $jeux = Jeu::all();

        $jeu = $jeux->find($id);

        return view('jeu.show', ['jeu' => $jeu]);
    }

    /**
     * Show rules .
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function rules($id)
    {
        $jeux = Jeu::all();

        $jeu = $jeux->find($id);

        return view('jeu.rules', ['jeu' => $jeu]);
    }

}
