<?php

namespace App\View\Components;

use App\Models\Jeu;
use Illuminate\View\Component;

class Carte extends Component
{
    private $nom;
    private $editeur;
    private $theme;

    public function __construct(Jeu $jeu)
    {
        $this->nom = $jeu->$nom
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.carte');
    }
}

class Tag {

}
