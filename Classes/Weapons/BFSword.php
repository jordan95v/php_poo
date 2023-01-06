<?php

namespace Classes\Weapons;

use Classes\Abstracts\PhysicalWeapon;

class BFSword extends PhysicalWeapon
{
    public function __construct()
    {
        parent::__construct("Big Fucking Sword", "A sister weapon of the Big Fucking Weapon", 25);
    }
}
