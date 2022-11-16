<?php

namespace App\Interfaces;

use App\Components\Characters\Character;

interface OwnershipInterface
{
    public function setOwner(?Character $owner): self;

    public function getOwner(): ?Character;

    public function getOwnedSince(): ?\DateTime;
}