<?php

namespace App\Components\Characters\Foes;

use App\Components\Characters\Foe;
use App\Components\Items\Weapons\Weapon;

class Bat extends Foe
{
    /**
     * @throws \Exception
     */
    public function __construct(string $name)
    {
        parent::__construct($name, Foe::RACE_BAT);
        $this->setLife(random_int(05, 10));
        $this->setMana(random_int(0, 0));
        $this->setPhyPower(random_int(1, 10));
        $this->setMagPower(random_int(0, 0));
        $this->setEscape(random_int(90, 100));
        $this->setEquipableWeapon([Weapon::CLASS_SWORD, Weapon::CLASS_DAGGER, Weapon::CLASS_BOW, Weapon::CLASS_FIST], Weapon::CLASS_STAFF, Weapon::CLASS_WAND);
    }
}