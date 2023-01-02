<?php

namespace Classes\Weapons;

use Classes\Abstracts\PhysicalWeapon;

class Sword extends PhysicalWeapon
{
    public function __construct()
    {
        parent::__construct("Big sword", "Sword used by trained soldier", 25);
    }
}
