<?php

namespace Classes\Spell;

use Classes\Abstracts\Spell;
use Classes\Enum\SpellType;

class WaterCannon extends Spell
{
    public function __construct()
    {
        parent::__construct("Water Cannon", "Best Tortank's spell in Pokemon.", 20, SpellType::ATK);
    }
}
