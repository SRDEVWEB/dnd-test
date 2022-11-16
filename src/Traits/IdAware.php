<?php

namespace App\Traits;

trait IdAware
{
    public function generateId(): string
    {
        return uniqid('', true);
    }
}