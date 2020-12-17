<link rel="stylesheet" href="{{ URL::asset('css/prix.css') }}">
<?php
    $variable = $nombre_users / $user_total_site *100 ;
    $variable = round ( $variable );

    $x = $prix_moyen - $prix_minimum;
    $y = $prix_maximum - $prix_minimum;
    $marginVal = 100;

?>
<div class="row">
    <div class="col-2"></div>
    <p class="col-2 minim">Prix minimal</p>
    <div class="col-4"></div>
    <p class="col-2">Prix maximal</p>
    <div class="col-2"></div>
</div>
<div class="row">
    <div class="col-2"></div>
    <p class="col-2 minim">{{$prix_minimum}}</p>
    <div class="ligne col-4"></div>
    <p class="col-2">{{$prix_maximum}}</p>
    <div class="col-2"></div>
</div>
<div class="row">
    <div class="col-4"></div>
    <div class="col-4">
        <div style="margin-left:{{$marginVal}}%">
        <p class="moyen">^</p>
        <p class="moyen">{{$prix_moyen}}</p>
        </div>
    </div>
    <div class="col-4"></div>
</div>
<div class="row">
    <div class="col-4"></div>
    <div class="col-4">
        <div class="test">
            <div class="progress-circle red" data-value="{{$variable}}">
                <div class="progress-masque barre">
                    <div class="progress-barre barre"></div>
                    <div class="progress-sup50 barre"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-4"></div>
</div>


