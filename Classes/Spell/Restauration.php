<?php

namespace Classes\Spell;

use Classes\Abstracts\Spell;
use Classes\Enum\SpellType;

class Restauration extends Spell
{
    public function __construct()
    {
        parent::__construct("Restauration", "This is a basic heal.", 25, SpellType::HEAL);
    }
}
