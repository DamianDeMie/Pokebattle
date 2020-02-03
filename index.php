<?php
include 'Pokemon.php';

//Creates a empty array to store multiple attacks.
$attacks = [];
//Creates two attacks, Electric Ring and Pika Punch. both having a damage value of 50 and 20 respectively.
$attacks[] = new Attack('Electric Ring', 50);
$attacks[] = new Attack('Pika Punch', 20);
//Creates
$pikachu = new Pokemon('Pikachu', 'Fluffy', 60, 'Lightning', $attacks, 'Fire', 1.5, 'Fighting', 20);

$attacks = [];
$attacks[] = new Attack('Head Butt', 10);
$attacks[] = new Attack('Flare', 30);
$charmeleoen = new Pokemon('Charmeleon', 'Alduin', 60, 'Fire', $attacks, 'Water', 2, 'Lightning', 10);

$pikachu->battleTurn($charmeleoen, $pikachu->attacks[0]);
$charmeleoen->battleTurn($pikachu, $charmeleoen->attacks[1]);
