<?php

namespace Classes\Spell;

use Classes\Abstracts\Spell;
use Classes\Enum\SpellType;

class FireBall extends Spell
{
    public function __construct()
    {
        parent::__construct("Fire ball", "This is a fire ball.", 20, 12, SpellType::ATK);
    }
}
