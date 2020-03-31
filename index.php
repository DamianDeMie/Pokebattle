<?php
include 'Pokemon.php';
include 'Pikachu.php';
include 'Charmeleon.php';

//Creates a empty array to store multiple attacks.
$pikachu = new Pikachu('Fluffy');
$charmeleon = new Charmeleon('Alduin');

$pikachu->battleTurn($charmeleon, $pikachu->attacks['Electric Ring']);
$charmeleon->battleTurn($pikachu, $charmeleon->attacks['Flare']);
echo "<br>Op het moment zijn er " . Pokemon::getPopulation() . " Pokemons in de wereld!";
