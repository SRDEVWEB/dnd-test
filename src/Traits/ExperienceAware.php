<?php

namespace App\Traits;

trait ExperienceAware
{

    protected int $experienceTotal = 0;
    protected int $experienceLevel = 0;
    protected int $experienceLevelMax = 100;


    public function addXp(int $experience): void
    {
        $this->experienceTotal += $experience;
        $this->experienceLevel = (int)floor($this->experienceTotal / 100);
        // on check juste de pas depasser le level max
        if ($this->experienceLevel > $this->experienceLevelMax) {
            $this->experienceLevel = $this->experienceLevelMax;
        }
    }

    public function getXp(): int
    {
        return $this->experienceTotal;
    }

    public function getLevel(): int
    {
        return $this->experienceLevel;
    }


    /**
     * @return int
     */
    public function getExperienceLevelMax(): int
    {
        return $this->experienceLevelMax;
    }

    /**
     * @param int $experienceLevelMax
     * @return void
     */
    public function setExperienceLevelMax(int $experienceLevelMax): void
    {
        $this->experienceLevelMax = $experienceLevelMax;
    }
}