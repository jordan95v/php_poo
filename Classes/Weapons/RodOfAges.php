<?php

namespace Classes\Weapons;

use Classes\Abstracts\MagicalWeapon;

class RodOfAges extends MagicalWeapon
{
    public function __construct()
    {
        parent::__construct("Old rod", "Not the freshed branch on the tree.", 27);
    }
}
