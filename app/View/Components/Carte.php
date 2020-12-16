<?php

namespace App\View\Components;

use App\Models\Jeu;
use Illuminate\View\Component;

class Carte extends Component
{
    public $nom;
    public $editeur;
    public $theme;
    public $url_media;
    public $tags;

    public function __construct(Jeu $jeu)
    {
        $this->nom = $jeu->nom;
        $this->editeur = $jeu->editeur();
        $this->theme = $jeu->theme();
        $this->url_media = $jeu->url_media;
        $this->tags = $jeu->mecaniques();
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
