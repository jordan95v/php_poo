<?php

namespace Classes\Abstracts;

use Traits\HasPhysicalWeapon;

abstract class PhysicalCharacter extends Character
{
    use HasPhysicalWeapon;

    public function getPhysicalDamages(): float
    {
        if ($this->hasWeapon()) {
            return $this->weapon->applyBonus($this->physicalDamages);
        }
        return parent::getPhysicalDamages();
    }
}
