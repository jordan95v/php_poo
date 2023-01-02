<?php

namespace Classes\Spell;

use Classes\Abstracts\Spell;
use Classes\Enum\SpellType;

class Warmog extends Spell
{
    public function __construct()
    {
        parent::__construct("Warmog", "Good armor.", 0, 12, SpellType::DEF);
    }
}
