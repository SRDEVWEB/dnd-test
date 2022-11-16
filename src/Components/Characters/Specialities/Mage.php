<?php

namespace App\Components\Characters\Specialities;

use App\Components\Characters\Character;
use App\Components\Items\Weapons\Weapon;
use App\Interfaces\ExperienceInterface;
use App\Traits\ExperienceAware;

class Mage extends Character implements ExperienceInterface
{
    use ExperienceAware;

    /**
     * @throws \Exception
     */
    public function __construct(string $name)
    {
        parent::__construct($name, 'Mage');
        $this->setLife(60);
        $this->setMana(100);
        $this->setPhyPower(0);
        $this->setMagPower(random_int(60, 80));
        $this->setEscape(random_int(20, 100));
        $this->setEquipableWeapon([Weapon::CLASS_STAFF,
            Weapon::CLASS_WAND, Weapon::CLASS_FIST]);
    }
}