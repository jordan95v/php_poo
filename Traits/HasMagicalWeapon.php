<?php

namespace Traits;

use Classes\Abstracts\MagicalWeapon;

trait HasMagicalWeapon
{
    use HasWeapon;

    protected ?MagicalWeapon $weapon = null;

    public function takesWeapon(?MagicalWeapon $weapon)
    {
        // echo "{$this} prend ".lcfirst($weapon).PHP_EOL;
        $this->weapon = $weapon;
    }
}
