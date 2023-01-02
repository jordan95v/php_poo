<?php

namespace Classes\Spell;

use Classes\Abstracts\Spell;
use Classes\Enum\SpellType;

class Thornmail extends Spell
{
    public function __construct()
    {
        parent::__construct("Thornmail", "Rammus main always build this item.", 0, 20, SpellType::DEF);
    }
}
