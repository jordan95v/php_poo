<?php

namespace Classes\Abstracts;

use Classes\Enum\Type;

abstract class Character
{
    public function __construct(
        private float $health,
        private float $defense,
        protected float $physicalDamages,
        protected float $magicalDamages,
        protected float $mana,
        protected float $manaRegen,
        protected ?Spell $atkSpell,
        protected ?Spell $defSpell,
        protected ?Spell $healSpell,
        protected ?Type $type
    ) {
    }

    abstract public function regenMana();

    public function getType(): Type
    {
        return $this->type;
    }

    public function getMana(): int
    {
        return $this->mana;
    }

    public function getHealth(): float
    {
        return $this->health;
    }

    public function getPhysicalDamages(): float
    {
        return $this->physicalDamages;
    }

    public function getMagicalDamages(): float
    {
        return $this->magicalDamages;
    }

    public function getDefense(): float
    {
        $def = $this->defense;
        if ($this->defSpell) {
            $def += $this->defSpell->getValue();
        }
        if ($def > 100) {
            return 1;
        }
        return $def / 100;
    }

    public function attack(Character $character): void
    {
        $character->takesDamages($this->getPhysicalDamages(), $this->getMagicalDamages(), $character->getType());
    }

    public function attackSpell(Character $character): void
    {
        // echo "{$this} attaque ".lcfirst($character).($this->weapon ? " avec ".lcfirst($this->weapon->getName()) : " à mains nues").PHP_EOL;
        if ($this->atkSpell) {
            $character->takesDamages(0, $this->atkSpell->getValue(), $character->getType());
            $this->mana -= $this->atkSpell->getCost();
        }
    }

    public function heal(): void
    {
        if ($this->healSpell) {
            $this->health += $this->healSpell->getValue();
            $this->mana -= $this->atkSpell->getCost();
        }
    }

    public function takesDamages(float $physicalDamages, float $magicalDamages, Type $atkType): void
    {
        $damages = $physicalDamages + $magicalDamages;

        switch ($this->type) {
            case Type::WATER:
                switch ($atkType) {
                    case Type::FIRE:
                        $damages *= 0.5;
                        break;
                    case Type::PLANT:
                        $damages *= 2;
                        break;
                }
            case Type::FIRE:
                switch ($atkType) {
                    case Type::WATER:
                        $damages *= 0.5;
                        break;
                    case Type::PLANT:
                        $damages *= 2;
                        break;
                }
            case Type::PLANT:
                switch ($atkType) {
                    case Type::FIRE:
                        $damages *= 2;
                        break;
                    case Type::WATER:
                        $damages *= 0.5;
                        break;
                }
        }

        $damagesTaken = $damages - $damages * $this->getDefense();
        if ($damagesTaken > $this->health) {
            $this->health = 0;
        } else {
            $this->health -= $damagesTaken;
        }
    }

    public function isAlive(): bool
    {
        return $this->health > 0;
    }

    abstract public function __toString();
}
