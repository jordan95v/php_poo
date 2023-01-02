<?php

namespace Classes\Spell;

use Classes\Abstracts\Spell;
use Classes\Enum\SpellType;

class LaserBeam extends Spell
{
    public function __construct()
    {
        parent::__construct("Laser Beam", "This is a laser beam.", 20, SpellType::ATK);
    }
}
