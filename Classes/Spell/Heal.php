<?php

namespace Classes\Spell;

use Classes\Abstracts\Spell;
use Classes\Enum\SpellType;

class Heal extends Spell
{
    public function __construct()
    {
        parent::__construct("Heal", "This is a basic heal.", 20, SpellType::HEAL);
    }
}
