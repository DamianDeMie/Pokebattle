<?php

class EnergyType
{
    public $name;
    /**
     * Makes a constructor with one parameter to be used by other classes.
     *
     * @param string $name
     */
    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * Functions that gets the name of the Energy Type
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
}
