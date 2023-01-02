<?php

namespace Classes\Weapons;

use Classes\Abstracts\PhysicalWeapon;

class Sword extends PhysicalWeapon
{
    public function __construct()
    {
        parent::__construct("The big sword", "Sword used by trained soldier", 25);
    }
}
