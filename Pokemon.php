<?php

/**
 * This is a program to create Pokemons as well as simulate a battle between them.
 *
 *
 * @author Damian de Mie
 * @version 1.0
 */


namespace Pokemon;

/* Loads all the required classes */

spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});

class Pokemon
{
    static $amountOfPokemon;
    protected $name;
    private $energyType;
    private $hitpoints;
    private $weakness;
    private $resistance;

    /**
     * Constructor that will be linked to the seperate "Pokemon" classes to create those easily with preset values.
     *
     * @param string $name
     * @param string $energyType
     * @param int $hitpoints
     * @param mixed $attacks
     * @param mixed $weakness
     * @param mixed $resistance
     * @param int $amountOfPokemon
     */

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


    /**
     * Simulates a battle between two Pokemon.
     *
     * @param mixed $target
     * @param mixed $attack
     * @return void
     */
    public function battleTurn($target, $attack)
    {
        //Gets all the required data from the pokemons before starting the battle
        $energyType = $this->getEnergyType()->getName();
        $weaknessEnergyType = $target->getWeakness()->getEnergyType();
        $multiplierEnergyType = $target->getWeakness()->getEnergyTypeValue();


        $resistanceEnergyType = $target->getResistance()->getEnergyType();
        $resistance = $target->getResistance()->getEnergyTypeValue();

        // Checks if the weakness of the target is the same as the attacking Pokemons Energy Type, if so multiplies damage by set amount.
        if ($weaknessEnergyType == $energyType) {
            $attack->multiplyDamage($multiplierEnergyType);
        } //C hecks if the resistance of the target is the same as the attacking Pokemons Energy Type, if so decreases damage by set amount.
        elseif ($resistanceEnergyType == $energyType) {
            $attack->reduceDamage($resistance);
        } // If neither of the previous conditions are met, attacks with normal damage value.
        else {
            $damage = $attack->getAttackDamage();
        }
        $damage = $attack->getAttackDamage();
        // After every move, the damage is subtracted from the targets health.
        $target->damageDone($damage);
    }
    /**
     * Calculates the damage done after the Battle Turn is over.
     *
     * @param int $damage
     * @return int
     */
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

    /**
     * Gets all the population from the pokemon
     *
     * @return int
     */
    static function getPopulation()
    {
        return self::$amountOfPokemon;
    }
    /**
     * Gets the Pokemons name
     *
     * @return string
     */

    public function getPokemonName()
    {
        return $this->name;
    }
    /**
     * Gets the Pokemons Energy Type
     *
     * @return mixed
     */
    public function getEnergyType()
    {
        return $this->energyType;
    }
    /**
     * Gets the Pokemons Hitpoints
     *
     * @return int
     */
    public function getHitpoints()
    {
        return $this->hitpoints;
    }
    /**
     * Gets the Pokemons attack
     *
     * @return mixed
     */
    public function getAttack()
    {
        return $this->attack;
    }
    /**
     * Gets the Pokemons weakness
     *
     * @return mixed
     */
    public function getWeakness()
    {
        return $this->weakness;
    }
    /**
     * Gets the Pokemons Resistance
     *
     * @return mixed
     */
    public function getResistance()
    {
        return $this->resistance;
    }
    /**
     * Gets the Pokemons health
     *
     * @return int
     */
    public function getHealth()
    {
        return $this->health;
    }
}
