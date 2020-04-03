<?php

class Weakness
{
    //Declares properties used for the Weakness class
    public $name;
    public $multiplier;

    //Creates a constructor
    public function __construct($name, $multiplier)
    {
        $this->name = $name;
        $this->multiplier = $multiplier;
    }

    public function getEnergyType()
    {
        return $this->name;
    }

    public function getEnergyTypeValue()
    {
        return $this->multiplier;
    }
}
