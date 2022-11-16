<?php

namespace App\Components\Items\Weapons;

use App\Components\Items\Item;
use App\Interfaces\ExperienceInterface;
use App\Traits\ExperienceAware;

class Weapon extends Item implements ExperienceInterface
{
    use ExperienceAware;

    public const CLASS_SWORD = 'sword';
    public const CLASS_AXE = 'axe';
    public const CLASS_DAGGER = 'dagger';
    public const CLASS_BOW = 'bow';
    public const CLASS_STAFF = 'staff';
    public const CLASS_WAND = 'wand';
    public const CLASS_SPEAR = 'spear';
    public const CLASS_HAMMER = 'hammer';
    public const CLASS_FIST = 'fist';

    protected int $damage;
    protected bool $isTwoHanded;
    protected string $weaponclass;

    public function __construct(
        string $name,
        string $description,
        bool   $equipable,
        string $category,
        int    $damage,
        bool   $isTwoHanded,
        string $weaponclass
    )
    {
        parent::__construct($name, $description, $equipable, $category);
        $this->damage = $damage;
        $this->isTwoHanded = $isTwoHanded;
        $this->weaponclass = $weaponclass;
        $this->setExperienceLevelMax(22);
    }

    /**
     * @return int
     */
    public function getDamage(): int
    {
        return $this->damage;
    }

    /**
     * @param int $damage
     * @return Weapon
     */
    public function setDamage(int $damage): Weapon
    {
        $this->damage = $damage;

        return $this;
    }

    /**
     * @return bool
     */
    public function isTwoHanded(): bool
    {
        return $this->isTwoHanded;
    }

    /**
     * @param bool $isTwoHanded
     * @return Weapon
     */
    public function setIsTwoHanded(bool $isTwoHanded): Weapon
    {
        $this->isTwoHanded = $isTwoHanded;

        return $this;
    }

    /**
     * @return string
     */
    public function getWeaponclass(): string
    {
        return $this->weaponclass;
    }

    /**
     * @param string $weaponclass
     * @return Weapon
     */
    public function setWeaponclass(string $weaponclass): Weapon
    {
        $this->weaponclass = $weaponclass;

        return $this;
    }

}