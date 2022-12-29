<?php

namespace Traits;

use Classes\Abstracts\PhysicalWeapon;

trait HasPhysicalWeapon
{
    use HasWeapon;

    protected ?PhysicalWeapon $weapon = null;

    public function takesWeapon(?PhysicalWeapon $weapon)
    {
        // echo "{$this} prend ".lcfirst($weapon).PHP_EOL;
        $this->weapon = $weapon;
    }
}
