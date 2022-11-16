<?php

namespace App\Traits;

use App\Components\Characters\Character;

trait OwnershipAware
{
    protected ?Character $owner;
    protected ?\DateTime $ownedSince = null;

    public function getOwner(): ?Character
    {
        return $this->owner;
    }

    public function setOwner(?Character $owner): self
    {
        $this->owner = $owner;
        $this->ownedSince = new \DateTime();

        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getOwnedSince(): ?\DateTime
    {
        return $this->ownedSince;
    }
}