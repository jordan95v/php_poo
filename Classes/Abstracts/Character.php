<?php

namespace Classes\Abstracts;

use Classes\Enum\Type;

abstract class Character
{
    public function __construct(
        private float $health = 29,
        private float $defense = 60,
        protected float $physicalDamages = 9,
        protected float $magicalDamages = 9,
        private float $mana = 100,
        protected ?Spell $atkSpell,
        protected ?Spell $defSpell,
        protected ?Spell $healSpell,
        protected ?Type $type
    ) {
    }

    public function getType(): Type
    {
        return $this->type;
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
        if ($this->defense > 100) return 1;

        return $this->defense / 100;
    }
    public function attack(Character $character): void
    {
        // echo "{$this} attaque ".lcfirst($character).($this->weapon ? " avec ".lcfirst($this->weapon->getName()) : " à mains nues").PHP_EOL;
        $character->takesDamages($this->getPhysicalDamages(), $this->getMagicalDamages(), $character->getType());
    }

    public function takesDamages(float $physicalDamages, float $magicalDamages, Type $atkType): void
    {
        $damages = $physicalDamages + $magicalDamages;

        switch($this->type){
            case Type::WATER:
                switch($atkType){
                    case Type::FIRE:
                        $damages *= 0.5;
                        break;
                    case Type::PLANT:
                        $damages *= 2;
                        break;
                }
            case Type::FIRE:
                switch($atkType){
                    case Type::WATER:
                        $damages *= 0.5;
                        break;
                    case Type::PLANT:
                        $damages *= 2;
                        break;
                }
            case Type::PLANT:
                switch($atkType){
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
