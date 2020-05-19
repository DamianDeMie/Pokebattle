<?php

class Weakness
{
    //Declares properties used for the Weakness class
    public $name;
    public $multiplier;

    //Creates a constructor with two parameters to be used by other classes.
    public function __construct($name, $multiplier)
    {
        $this->name = $name;
        $this->multiplier = $multiplier;
    }

    /**
     * Gets the name of the Energy Type
     *
     * @return string
     */
    public function getEnergyType()
    {
        return $this->name;
    }
    /**
     * Gets the value of the Weakness Multiplier
     *
     * @return int
     */
    public function getEnergyTypeValue()
    {
        return $this->multiplier;
    }
}
