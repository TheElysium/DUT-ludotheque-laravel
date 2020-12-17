<?php

namespace App\Http\Controllers;
use App\Models\Jeu;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    function welcome(Request $request)
    {
        $option = $request->get('options', null);
        switch ($option) {
            case 'rand':
                $jeux = $this->aleatoire(5);
                return view('welcome-aleatoire', ['jeux' => $jeux]);
            case 'best':
                $jeux = $this->meilleurs(5);
                Log::info($jeux);
                return view('welcome-best', ['jeux' => $jeux]);

        }
        return view('welcome');
    }


    function aleatoire($n) {
        $jeu_ids = Jeu::all()->pluck('id');
        $faker = \Faker\Factory::create();
        $ids = $faker->randomElements($jeu_ids->toArray(), $n);
        $jeux = [];
        foreach ($ids as $id) {
            $jeux[] = Jeu::findOrFail($id);
        }
        return $jeux;
    }


    function meilleurs($n){

        $ids = DB::table('commentaires')->join('jeux', 'jeux.id', '=', 'commentaires.jeu_id')
            ->select('jeux.id')
            ->groupBy('jeux.id')
            ->orderByDesc(DB::raw('AVG(commentaires.note)'))
            ->limit($n)
            ->get()->pluck('jeux.id')->toArray();



        $tab = [];
        foreach (Jeu::all() as $jeu){
            $tab[$jeu->id] = $jeu->noteMoyenne();
        }

        arsort($tab);

        $tab = array_slice($tab,0,$n+1);
        $res = [];

        foreach ($tab as $k => $v) {
            $res[] = Jeu::find($k);
        }

        return $res;
    }

}

