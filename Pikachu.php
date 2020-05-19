<?php
class Pikachu extends \Pokemon\Pokemon
{
    /**
     * Creates a constructor for the Pikachu class with preset values
     *
     * @param string $name
     */
    public function __construct($name)
    {
        $energyType = new EnergyType('Lightning');
        $hitpoints = 60;
        $attacks = array(
            'Electric Ring' => new Attack('Electric Ring', 50),
            'Pika Punch' => new Attack('Pika Punch', 20)
        );
        $weakness = new Weakness('Fire', 1.5);
        $resistance = new Resistance('Fighting', 20);
        //Because the Pikachu class extends to the Pokemon class, it sends all the data to the parent class which will execute the rest of the code.
        parent::__construct($name, $energyType, $hitpoints, $attacks, $weakness, $resistance);
    }
}
