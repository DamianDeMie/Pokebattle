<?php

namespace Pokemon;

spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});

class Pokemon
{
    /* Declares all the variables required for the Pokemon class. */
    static $amountOfPokemon;
    public $name;
    private $energyType;
    private $hitpoints;
    public $attacks;
    private $weakness;
    private $resistance;

    /* Constructor that will be linked to the seperate "Pokemon" classes to create those easily with preset values. */
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


    /*Simulates the battle between two Pokemon. */
    public function battleTurn($target, $attack)
    {
        //Gets all the required data from the pokemons before starting the battle
        $energyType = $this->energyType->getName();
        $weaknessEnergyType = $target->getWeakness()->getEnergyType();
        $multiplierEnergyType = $target->getWeakness()->getEnergyTypeValue();


        $resistanceEnergyType = $target->getResistance()->getEnergyType();
        $resistance = $target->getResistance()->getEnergyTypeValue();

        //Checks if the weakness of the target is the same as the attacking Pokemons Energy Type, if so multiplies damage by set amount.
        if ($weaknessEnergyType == $energyType) {
            $attack->multiplyDamage($multiplierEnergyType);
        } //Checks if the resistance of the target is the same as the attacking Pokemons Energy Type, if so decreases damage by set amount.
        elseif ($resistanceEnergyType == $energyType) {
            $attack->reduceDamage($resistance);
        } //If neither of the previous conditions are met, attacks with normal damage value.
        else {
            $damage = $attack->getAttackDamage();
        }
        $damage = $attack->getAttackDamage();
        //After every move, the damage is subtracted from the targets health.
        $target->damageDone($damage);
    }

    public function damageDone($damage)
    {
        //Subtracts the damage value from the targets health.
        $this->health -= $damage;
        return $damage;
        //if the target health reaches 0, displays a message that the target has fainted and removes them from the amount of Pokemon pool.
        if ($this->health <= 0) {
            self::$amountOfPokemon--;
        }
    }

    /*Shows how many Pokemon exist at the time of execution. */
    static function getPopulation()
    {
        return self::$amountOfPokemon;
    }
    /*Gets the Pokemons name */

    public function getPokemonName()
    {
        return $this->name;
    }

    /*Gets the Pokemons energy type */
    public function getEnergyType()
    {
        return $this->energyType;
    }
    /*Gets the Pokemons hitpoints */
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
