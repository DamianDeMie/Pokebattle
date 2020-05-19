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

echo "<br><strong>" . $charmeleon->getPokemonName() .  " HP: " . $charmeleon->getHitPoints() . "/" .  $charmeleon->getHitpoints() . " <br>";

echo "<br><strong>" . $pikachu->getPokemonName() . " valt aan met " . $pikachu->attacks['Electric Ring']->name . '!<br>';

echo "<br><strong>" . $charmeleon->getPokemonName() .  " heeft nog " . $charmeleon->getHealth() . "hp over! <br><br>";

$charmeleon->battleTurn($pikachu, $charmeleon->attacks['Flare']);
echo "<br><strong>" . $pikachu->getPokemonName() .  " HP: " . $pikachu->getHitPoints() . "/" .  $pikachu->getHitpoints() . " <br>";
echo "<br><strong>" . $charmeleon->getPokemonName() . " valt aan met " . $charmeleon->attacks['Flare']->name . '!<br>';
echo "<br><strong>" . $pikachu->getPokemonName() .   " heeft nog " . $pikachu->getHealth() . "hp over! <br><br>";


//After both moves have been done, it shows you how many Pokemon are left.
echo "<br>Op het moment zijn er " . Pokemon::getPopulation() . " Pokemons in de wereld!";
