<?php

namespace Classes\Weapons;

use Classes\Abstracts\PhysicalWeapon;

class Cutlass extends PhysicalWeapon
{
    public function __construct()
    {
        parent::__construct("Little knife", "Use by sneaky thief", 30);
    }
}
