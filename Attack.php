<?php

class Attack
{
    public $name;
    public $damage;
    /**
     *  Makes a constructor with two parameters to be used by other classes.
     *
     * @param string $name
     * @param int $damage
     */
    public function __construct($name, $damage)
    {
        $this->name = $name;
        $this->damage = $damage;
    }
    /**
     * Multiples the damage done by the weakness Multipler
     *
     * @param int $multiplier
     * @return int
     */
    public function multiplyDamage($multiplier)
    {
        $this->damage = $this->damage * $multiplier;
    }
    /**
     * Reduces the damage done by the resistance value
     *
     * @param int $resistance
     * @return int
     */
    public function reduceDamage($resistance)
    {
        $this->damage = $this->damage - $resistance;
    }
    /**
     * Gets the current attack name
     *
     * @return string
     */
    public function getAttackName()
    {
        return $this->name;
    }

    /**
     * Reduces the damage done by the resistance value
     *
     * @return int
     */

    /**
     * Returns the damage done in total.
     *
     * @return int
     */
    public function getAttackDamage()
    {
        return $this->damage;
    }
}
