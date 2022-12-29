<?php

namespace Classes\Characters;

use Classes\Abstracts\MagicalCharacter;

class Wizard extends MagicalCharacter
{
    public function __construct($atkSpell = null, $defSpell = null, $healSpell = null, $type = null)
    {
        parent::__construct(health: 28, 
            defense: 56, 
            physicalDamages: 5, 
            magicalDamages: 11,
            mana: 100,
            manaRegen: 15,
            type: $type,
            atkSpell: $atkSpell,
            defSpell: $defSpell,
            healSpell: $healSpell
        );
    }

    public function getMagicalDamages(): float
    {
        $baseDamages = parent::getMagicalDamages();
        if (chance(10)) {
            // echo "{$this} inflige des dégats magiques critiques !".PHP_EOL;
            return $baseDamages * 2;
        }
        return $baseDamages;
    }

    public function takesDamages(float $physicalDamages, float $magicalDamages, $type): void
    {
        if (chance(10)) {
            // echo "{$this} subit moins de dégats grâce à la chance...".PHP_EOL;
            parent::takesDamages($physicalDamages * 0.9, $magicalDamages * 0.9, $type);
        } else {
            parent::takesDamages($physicalDamages, $magicalDamages,$type);
        }
    }

    public function regenMana()
    {
        $this->mana += $this->manaRegen;
        if($this->mana > 100){
            $this->mana = 100;
        }
    }

    public function __toString()
    {
        return "Le Sorcier";
    }
}
