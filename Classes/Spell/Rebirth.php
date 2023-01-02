<?php

namespace Classes\Spell;

use Classes\Abstracts\Spell;
use Classes\Enum\SpellType;

class Rebirth extends Spell
{
    public function __construct()
    {
        parent::__construct("Rebirth", "This is a basic heal.", 20, SpellType::HEAL);
    }
}
