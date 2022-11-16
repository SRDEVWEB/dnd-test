<?php

namespace App\Components\Characters\Pets;

use App\Components\Bags\Bag;
use App\Components\Characters\Character;
use App\Interfaces\OwnershipInterface;
use App\Traits\OwnershipAware;

abstract class Pet extends Character implements OwnershipInterface
{
    use OwnerShipAware;

    /**
     * @throws \Exception
     */
    public function __construct(string $name)
    {
        parent::__construct($name, 'Pet');
        Character::changeBag($this, 5);
        $this->hasPet = false; // Pet can't have Pet
    }
}