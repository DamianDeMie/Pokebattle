<?php

namespace Pokemon;

spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});

abstract class Pokemon
{
    //Declares all the variables required for the Pokemon class.
    static $amountOfPokemon;
    public $name;
    public $energyType;
    public $hitpoints;
    public $attacks;
    public $weakness;
    public $resistance;

    //Constructor that will be linked to the seperate "Pokemon" classes to create those easily with preset values.
    public function __construct($name, $energyType, $hitpoints, $attacks, $weakness, $resistance)
    {
        $this->name = $name;
        $this->energyType =  $energyType;
        $this->hitpoints = $hitpoints;
        $this->health = $hitpoints;
        $this->attacks = $attacks;
        $this->weakness = $weakness;
        $this->resistance = $resistance;

        self::$amountOfPokemon++;
    }


    //Simulates the battle between two Pokemon.
    public function battleTurn($target, $attack)
    {
        //Gets all the required data from the pokemons before starting the battle
        $energyType = $this->energyType->getName();
        $weaknessEnergyType = $target->getWeakness()->getEnergyType();
        $multiplierEnergyType = $target->getWeakness()->getEnergyTypeValue();

        $resistanceEnergyType = $target->getResistance()->getEnergyType();
        $resistance = $target->getResistance()->getEnergyTypeValue();


        //Shows how much Hitpoints (HP) is left.
        echo "<br><strong>" . $target->getPokemonName() .  " HP: " . $target->getHealth() . "/" .  $target->getHitpoints() . " <br><br>";
        //Checks if the weakness of the target is the same as the attacking Pokemons Energy Type, if so multiplies damage by set amount.
        if ($weaknessEnergyType == $energyType) {
            $damage = $attack->getAttackDamage() * $multiplierEnergyType;
            echo $this->name . " valt aan met " .  $attack->getAttackName() . "! It's super effective! (" . $damage . " damage)<br>";
        } //Checks if the resistance of the target is the same as the attacking Pokemons Energy Type, if so decreases damage by set amount.
        elseif ($resistanceEnergyType == $energyType) {
            $damage = $attack->getAttackDamage() - $resistance;
            echo $this->name . " valt aan met " .  $attack->getAttackName() . "! It's not very effective (" . $damage . " damage)<br>";
        } //If neither of the previous conditions are met, attacks with normal damage value.
        else {
            $damage = $attack->getAttackDamage();
            echo $this->name . " valt aan met " .  $attack->getAttackName() . " (" . $damage . " damage)<br>";
        }
        //After every move, the damage is subtracted from the targets health.
        $this->damageDone($damage, $target);
    }

    public function damageDone($damage, $target)
    {
        //Subtracts the damage value from the targets health.
        $target->health -= $damage;
        //if the target health reaches 0, displays a message that the target has fainted and removes them from the amount of Pokemon pool.
        if ($target->health <= 0) {
            echo $target->getPokemonName()  .  " fainted!";
            self::$amountOfPokemon--;
        } //Shows how much health is still left from the target if the target health isn't 0.
        else {
            echo $target->getPokemonName() . " heeft nog " . $target->health . " hp over!<br>";
        }
    }

    //Shows how many Pokemon exist at the time of execution.
    static function getPopulation()
    {
        return self::$amountOfPokemon;
    }

    public function getPokemonName()
    {
        return $this->name;
    }

    public function getEnergyType()
    {
        return $this->energyType;
    }

    public function getHitpoints()
    {
        return $this->hitpoints;
    }

    public function getAttack()
    {
        return $this->attack;
    }

    public function getWeakness()
    {
        return $this->weakness;
    }

    public function getResistance()
    {
        return $this->resistance;
    }

    public function getHealth()
    {
        return $this->health;
    }
}
