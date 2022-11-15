<?php

namespace App\Components\Characters;

abstract class Foe extends Character
{
    public const RACE_GOBLIN = 'goblin';
    public const RACE_ORC = 'orc';
    public const RACE_BAT = 'bat';
    public const RACE_SKELETON = 'skeleton';
    public const RACE_ZOMBIE = 'zombie';

    protected string $race;

    public function __construct(string $name, string $race)
    {
        parent::__construct($name, 'Foe');
        $this->setRace($race);
    }


// TODO nom random, stats random
// TODO Foe : bat|zombie|orc|goblin|skeleton
// TODO each Foe override attackTarget(Character $target) => code pour calculer les dégats et l'utilisation de mana
    /**
     * @return string
     */
    public function getRace(): string
    {
        return $this->race;
    }

    /**
     * @param string $race
     * @return Foe
     */
    public function setRace(string $race): Foe
    {
        $this->race = $race;

        return $this;
    }

}