<?php

require "Attack.php";
require "EnergyType.php";
require "Resistance.php";
require "Weakness.php";

class Pokemon
{
    //Declares all the variables required for the Pokemon class.
    public $name = '';
    public $nickname = '';
    public $hitpoints;
    public $health;
    public $energyType;
    public $attacks;
    public $weakness;
    public $resistance;

    //Constructor that allows you to create the Pokemon easily by using the "new Pokemon" command.
    public function __construct($name, $nickname, $hitpoints, $energyType, $attacks, $weaknessName, $weaknessMultiplier, $resistanceName, $resistanceValue)
    {
        $this->name = $name;
        $this->nickname = $nickname;
        $this->hitpoints = $hitpoints;
        $this->health = $hitpoints;
        $this->energyType =  new EnergyType($energyType);
        $this->attacks = $attacks;
        $this->weakness = new Weakness($weaknessName, $weaknessMultiplier);
        $this->resistance = new Resistance($resistanceName, $resistanceValue);
    }


    //Simulates the battle between two Pokemon.
    public function battleTurn($target, $attack)
    {
        //Shows how much Hitpoints (HP) is left.
        echo "<br><strong> $target->name HP: $target->health / $target->hitpoints <br><br>";
        //Checks if the weakness of the target is the same as the attacking Pokemons Energy Type, if so multiplies damage by set amount.
        if ($target->weakness->name == $this->energyType->name) {
            $damage = $attack->damage * $target->weakness->multiplier;
            echo "$this->name valt aan met $attack->name! It's super effective! ($damage)<br>";
        } //Checks if the resistance of the target is the same as the attacking Pokemons Energy Type, if so decreases damage by set amount.
        elseif ($target->resistance->name == $this->energyType->name) {
            $damage = $attack->damage - $target->resistance->value;
            echo "$this->name valt aan met $attack->name! It's not very effective ($damage)<br>";
        } //If neither of the previous conditions are met, attacks with normal damage value.
        else {
            $damage = $attack->damage;
            echo "$this->name valt aan met $attack->name! ($damage)<br>";
        }
        //After every move, the damage is subtracted from the targets health.
        $this->damageDone($damage, $target);
    }

    public function damageDone($damage, $target)
    {
        //Subtracts the damage value from the targets health.
        $target->health -= $damage;
        //if the target health reaches 0, displays a message that the target has fainted.
        if ($target->health <= 0) {
            echo "$target->name fainted!";
        } //Shows how much health is still left from the target if the target health isn't 0.
        else {
            echo "$target->name heeft nog $target->health hp over!<br>";
        }
    }
}
