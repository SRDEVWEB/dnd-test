<?php

namespace App\Components\Characters\Pets\Creatures;

use App\Components\Characters\Character;
use App\Components\Characters\Pets\Pet;
use App\Components\Items\Weapons\Weapon;

class Dog extends Pet
{
    public function __construct(string $name)
    {
        parent::__construct($name, 'Dog');
        $this->setLife(60);
        $this->setMana(0);
        $this->setPhyPower(5);
        $this->setMagPower(0);
        $this->setEscape(random_int(20, 100));
        $this->setEquipableWeapon([Weapon::CLASS_FIST]);
        $this->hasPet = false; // Pet can't have Pet
        $this->hasItem = false; // Pet can't have Shield
        Character::changeBag($this, 0);
    }
}