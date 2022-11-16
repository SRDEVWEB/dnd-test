<?php

namespace App\Components\Items\Weapons;

use App\Components\Items\Item;

class Axe extends Weapon
{
    public function __construct(
        string $name,
        string $description,
        int    $damage,
        bool   $isTwoHanded,
    )
    {
        parent::__construct($name, $description, true,
            Item::CAT_WEAPON, $damage, $isTwoHanded,
            Weapon::CLASS_AXE);
        echo $this->getName().' is in...'.PHP_EOL;
    }
}