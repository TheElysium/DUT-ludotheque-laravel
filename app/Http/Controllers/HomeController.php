<?php

namespace App\Http\Controllers;
use App\Models\Jeu;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    function welcome($aleatoire=null){
        if($aleatoire == 'rand'){
            $jeux = $this->aleatoire(5);
            return view('welcome-aleatoire',['jeux' => $jeux]);
        }
        return view('welcome');
    }
    function aleatoire($n) {
        $jeu_ids = Jeu::all()->pluck('id');
        $faker = \Faker\Factory::create();
        $ids = $faker->randomElements($jeu_ids->toArray(), $n);
        $jeux = [];
        foreach ($ids as $id) {
            $jeux[] = Jeu::find($id);
        }
        return $jeux;
    }



}
