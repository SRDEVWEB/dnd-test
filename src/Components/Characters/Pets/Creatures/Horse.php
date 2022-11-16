<?php

namespace App\Components\Characters\Pets\Creatures;

use App\Components\Characters\Character;
use App\Components\Characters\Pets\Pet;
use App\Components\Items\Weapons\Weapon;

class Horse extends Pet
{
    public function __construct(string $name)
    {
        parent::__construct($name, 'Horse');
        $this->setLife(100);
        $this->setMana(0);
        $this->setPhyPower(10);
        $this->setMagPower(0);
        $this->setEscape(0);
        $this->setEquipableWeapon([Weapon::CLASS_FIST]);
        $this->hasPet = false; // Pet can't have Pet
        $this->hasItem = false; // Pet can't have Shield
        Character::changeBag($this, 15);
    }
}