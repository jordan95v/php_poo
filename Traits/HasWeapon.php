<?php

namespace Traits;

trait HasWeapon
{
    public function hasWeapon(): bool
    {
        return !is_null($this->weapon);
    }
}
