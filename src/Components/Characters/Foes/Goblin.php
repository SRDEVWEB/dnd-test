<?php

namespace App\Components\Characters\Foes;

use App\Components\Items\Weapons\Weapon;
use App\Traits\ExperienceAware;

class Goblin extends Foe
{
    /**
     * @throws \Exception
     */
    public function __construct(string $name)
    {
        parent::__construct($name, Foe::RACE_GOBLIN);
        $this->setLife(random_int(20, 40));
        $this->setMana(random_int(0, 20));
        $this->setPhyPower(random_int(20, 50));
        $this->setMagPower(random_int(10, 30));
        $this->setEscape(random_int(50, 100));
        $this->setEquipableWeapon(
            [
                Weapon::CLASS_SWORD,
                Weapon::CLASS_DAGGER,
                Weapon::CLASS_BOW,
                Weapon::CLASS_FIST,
                Weapon::CLASS_HAMMER,
                Weapon::CLASS_STAFF,
                Weapon::CLASS_WAND,
            ]
        );
    }
}