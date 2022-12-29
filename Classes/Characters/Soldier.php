<?php

namespace Classes\Characters;

use Classes\Abstracts\PhysicalCharacter;

class Soldier extends PhysicalCharacter
{
    public function __construct($atkSpell = null, $defSpell = null, $healSpell = null, $type = null)
    {
        parent::__construct(
            health: 32,
            defense: 60, 
            physicalDamages: 8, 
            magicalDamages: 0,
            mana: 50,
            manaRegen: 10,
            atkSpell: $atkSpell,
            defSpell: $defSpell,
            healSpell: $healSpell,
            type: $type
        );
    }

    public function getPhysicalDamages(): float
    {
        $baseDamages = parent::getPhysicalDamages();

        if (chance(10)) {
            // echo "{$this} inflige un coup critique !".PHP_EOL;
            return $baseDamages * 2;
        }
        return $baseDamages;
    }

    public function takesDamages(float $physicalDamages, float $magicalDamages, $type): void
    {
        parent::takesDamages($physicalDamages, $magicalDamages * 0.8, $type);
    }

    public function regenMana()
    {
        $this->mana += $this->manaRegen;
        if($this->mana > 50){
            $this->mana = 50;
        }
    }

    public function __toString()
    {
        return "Le Soldat";
    }
}
