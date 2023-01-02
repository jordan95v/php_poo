<?php

namespace Classes\Spell;

use Classes\Abstracts\Spell;
use Classes\Enum\SpellType;

class Sunfire extends Spell
{
    public function __construct()
    {
        parent::__construct("Sunfire", "It burns.", 0, 15, SpellType::DEF);
    }
}
