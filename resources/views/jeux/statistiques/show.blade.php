<link rel="stylesheet" href="{{ URL::asset('css/stat.css') }}">

<?php
    $color = '#000000';
    $size = '50';
    if ( $note_moyenne > 4.5) {
        $color = '#80ff00';
    }
    else if ( $note_moyenne > 4.0 ){
        $color = '#d8ff00';
    }
    else if ( $note_moyenne > 3.5 ){
        $color = '#ffaa00';
    }
    else if ( $note_moyenne > 3.0 ){
        $color = '#ff8b00';
    }
    else if ( $note_moyenne > 2.5 ){
        $color = '#ff6800';
    }
    else if ( $note_moyenne > 2.0 ){
        $color = '#ff3e00';
    }
    else if ( $note_moyenne > 1.5 ){
        $color = '#d33300';
    }
    else if ( $note_moyenne > 1.0 ){
        $color = '#d90000';
    }
    else if ( $note_moyenne > 0.5 ){
        $color = '#970000';
    }
    else{
        $color = '#7c0000';
    }
    if ( $classement <= 3 ) {
        $size = '200';
    }
    else if ( $classement <= 7 ){
        $size = '100';
    }
    else {
        $size = '50';
    }
?>

<p class="center" style="color:{{$color}}">Moyenne de note des ludoRanchers: {{$note_moyenne}}</p>
<p class="center" style="color:#80ff00">Note maximale: {{$note_maximum}}</p>
<p class="center" style="color:#7c0000">Note minimale: {{$note_minimum}}</p>

<p class="center"> Nombre de commentaires: {{$nombres_commentaires}}</p>
<p class="center">Nombre de commentaires pour tous les jeux: {{$nombres_commentaires_ttl}}</p>
<p class="center">Classement: {{$classement}}</p>
<img class="flamme" style="height:{{$size}}px; width:{{$size}}px"  src="{{asset('images/flamme.png')}}">

