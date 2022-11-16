<?php

namespace App\Components\Characters\Specialities;

use App\Components\Characters\Character;
use App\Components\Items\Weapons\Weapon;
use App\Interfaces\ExperienceInterface;
use App\Traits\ExperienceAware;

class Warrior extends Character implements ExperienceInterface
{
    use ExperienceAware;

    /**
     * @throws \Exception
     */
    public function __construct(string $name)
    {
        parent::__construct($name, 'Warrior');
        $this->setLife(100);
        $this->setMana(0);
        $this->setPhyPower(random_int(60, 80));
        $this->setMagPower(0);
        $this->setEscape(random_int(1, 100));
        $this->setEquipableWeapon([Weapon::CLASS_SWORD,
            Weapon::CLASS_AXE, Weapon::CLASS_SPEAR,
            Weapon::CLASS_HAMMER, Weapon::CLASS_FIST]);
        $this->setHasShield(true);
    }
}