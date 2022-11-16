<?php

namespace App\Components\Characters\Specialities;

use App\Components\Characters\Character;
use App\Components\Items\Weapons\Weapon;
use App\Interfaces\ExperienceInterface;
use App\Traits\ExperienceAware;

class Rogue extends Character implements ExperienceInterface
{
    use ExperienceAware;

    /**
     * @throws \Exception
     */
    public function __construct(string $name)
    {
        parent::__construct($name, 'Rogue');
        $this->setLife(80);
        $this->setMana(0);
        $this->setPhyPower(random_int(20, 50));
        $this->setMagPower(0);
        $this->setEscape(random_int(50, 100));
        $this->setEquipableWeapon([Weapon::CLASS_SWORD,
            Weapon::CLASS_DAGGER, Weapon::CLASS_BOW,
            Weapon::CLASS_FIST]);
    }
}