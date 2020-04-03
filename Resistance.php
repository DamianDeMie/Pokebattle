<?php
class Resistance
{
    public $name;
    public $value;

    public function __construct($name, $value)
    {
        $this->name = $name;
        $this->value = $value;
    }

    public function getEnergyType()
    {
        return $this->name;
    }

    public function getEnergyTypeValue()
    {
        return $this->value;
    }
}
