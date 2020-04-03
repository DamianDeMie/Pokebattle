<?php
include 'Pokemon.php';
include 'Pikachu.php';
include 'Charmeleon.php';

use Pokemon\Pokemon;

//Creates the two Pokemon required for the assignment with a nickname as well
$pikachu = new Pikachu('Fluffy');
$charmeleon = new Charmeleon('Alduin');

//Starts the battle between the two Pokemon, Pikachu attacks first with a attack called Electric Ring, and then Charmeleon attacks back with Flare
$pikachu->battleTurn($charmeleon, $pikachu->attacks['Electric Ring']);
$charmeleon->battleTurn($pikachu, $charmeleon->attacks['Flare']);

//After both moves have been done, it shows you how many Pokemon are left.
echo "<br>Op het moment zijn er " . Pokemon::getPopulation() . " Pokemons in de wereld!";
