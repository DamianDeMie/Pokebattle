<?php

class Attack
{
    public $name;
    public $damage;

    public function __construct($name, $damage)
    {
        $this->name = $name;
        $this->damage = $damage;
    }

    public function multiplyDamage($multiplier)
    {
        $this->damage = $this->damage * $multiplier;
    }
    // Als de resistance enerytpe gelijk is aan de energytype van de aanvalende pokemon word de damage - de resistance gedaan.
    public function reduceDamage($resistance)
    {
        $this->damage = $this->damage - $resistance;
    }

    public function getAttackName()
    {
        return $this->name;
    }

    public function getAttackDamage()
    {
        return $this->damage;
    }
}
