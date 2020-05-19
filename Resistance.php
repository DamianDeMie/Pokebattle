<?php
class Resistance
{
    public $name;
    public $value;
    /**
     *  Makes a constructor with two parameters to be used by other classes.
     *
     * @param string $name
     * @param int $value
     */
    public function __construct($name, $value)
    {
        $this->name = $name;
        $this->value = $value;
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
     * Gets the resistance value of that Energy Type
     *
     * @return int
     */
    public function getEnergyTypeValue()
    {
        return $this->value;
    }
}
