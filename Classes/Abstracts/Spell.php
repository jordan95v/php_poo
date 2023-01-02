<?php

namespace Classes\Abstracts;

use Classes\Enum\SpellType;

abstract class Spell
{
    public function __construct(
        protected string $name,
        protected string $description,
        protected int $manaCost,
        protected SpellType $spellType
    ) {
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }
}
