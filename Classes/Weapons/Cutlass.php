<?php

namespace Classes\Weapons;

use Classes\Abstracts\PhysicalWeapon;

class Cutlass extends PhysicalWeapon
{
    public function __construct()
    {
        parent::__construct("Le petit couteau", "Le sabre privilégié par les attaquants rapides et furieux.", 30);
    }
}
