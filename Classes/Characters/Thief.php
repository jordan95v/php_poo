<?php

namespace Classes\Characters;

use Classes\Abstracts\PhysicalCharacter;

class Thief extends PhysicalCharacter
{
    public function __construct($atkSpell = null, $defSpell = null, $healSpell = null)
    {
        parent::__construct(health: 34, 
            defense: 33, 
            physicalDamages: 16, 
            magicalDamages: 4,
            mana: 75,
            atkSpell: $atkSpell,
            defSpell: $defSpell,
            healSpell: $healSpell
        );
    }

    public function getPhysicalDamages(): float
    {
        $baseDamages = parent::getPhysicalDamages();

        if (chance(5)) {
            // echo "{$this} fait plus de dégats !".PHP_EOL;
            return $baseDamages * 1.2;
        }
        return $baseDamages;
    }

    public function getDefense(): float
    {
        if (chance(10)) {
            // echo "{$this} esquive l'attaque !".PHP_EOL;
            return 1;
        }
        return parent::getDefense();
    }

    public function __toString()
    {
        return "Le Voleur";
    }
}
