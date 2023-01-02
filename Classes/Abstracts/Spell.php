<?php

namespace Classes\Abstracts;

use Classes\Enum\SpellType;

abstract class Spell
{
    public function __construct(
        protected string $name,
        protected string $description,
        protected int $manaCost,
        protected int $value,
        protected SpellType $spellType
    ) {
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getValue(): int
    {
        return $this->value;
    }

    public function getCost(): int
    {
        return $this->manaCost;
    }

    public function getDescription(): string
    {
        return $this->description;
    }
}
