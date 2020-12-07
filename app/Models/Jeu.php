<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class Jeu extends Model {
    use HasFactory;

    protected $table = 'jeux';
    public $timestamps = false;

    protected $fillable = ['nom', 'description', 'regles', 'langue',
        'url_media', 'age', 'nombre_joueurs', 'categorie', 'duree'];

    function createur() {
        return $this->belongsTo(User::class);
    }

    function theme() {
        return $this->belongsTo(Theme::class);
    }

    function editeur() {
        return $this->belongsTo(Editeur::class);
    }

    function mecaniques() {
        return $this->belongsToMany(Mecanique::class, 'avec_mecaniques');
    }

    function acheteurs() {
        return $this->belongsToMany(User::class, 'achats')
            ->as('achat')
            ->withPivot('prix', 'lieu', 'date_achat');
    }

    function commentaires() {
        return $this->hasMany(Commentaire::class);
    }

    function note() {
        $cumul = 0;
        $i = 0;
        foreach ($this->commentaires as $commentaire) {
            $cumul += $commentaire->note | 0;
            $i++;
        }
        if ($i != 0) {
            Log::info(sprintf("moyenne %3.2f, cumul %d, nb notes = %d", ($cumul / $i), $cumul, $i));
            return sprintf("%3.2f",($cumul / $i));
        } else {
            Log::info(sprintf("pas encore noté, cumul %d, nb notes = %d", $cumul, $i));
            return "pas encore noté";
        }
    }
}
