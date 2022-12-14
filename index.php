<?php

require_once('./autoload.php');
require_once('./functions.php');

use Classes\Characters\Soldier;
use Classes\Characters\Thief;
use Classes\Characters\Wizard;
use Classes\Enum\SpellType;
use Classes\Enum\Type;
use Classes\Weapons\BFSword;
use Classes\Weapons\Cutlass;
use Classes\Weapons\RodOfAges;

$SPELL_TYPE = [SpellType::ATK, SpellType::DEF, SpellType::HEAL];

$class_choice = characterSelection();
$spells = [];

switch (typeSelection()) {
    case 1:
        $type = Type::FIRE;
        break;
    case 2:
        $type = Type::WATER;
        break;
    case 3:
        $type = Type::PLANT;
        break;
}

for ($i = 0; $i < count($SPELL_TYPE); $i++) {
    $spells[] = spellSelection($SPELL_TYPE[$i]);
}

switch ($class_choice) {
    case 1:
        $user = new Soldier(...$spells, type: $type);
        break;

    case 2:
        $user = new Thief(...$spells, type: $type);
        break;

    case 3:
        $user = new Wizard(...$spells, type: $type);
        break;
}

switch (weaponSelection()) {
    case 1:
        $weapon = new Cutlass();
        break;
    case 2:
        $weapon = new RodOfAges();
        break;
    case 3:
        $weapon = new BFSword();
        break;
    case 4:
        $weapon = null;
        break;
}

$user->takesWeapon($weapon);

$randed_spell = [ATK_SPELL[array_rand(ATK_SPELL)], DEF_SPELL[array_rand(DEF_SPELL)], HEAL_SPELL[array_rand(HEAL_SPELL)]];
$types = Type::cases();
$randed_type = $types[array_rand($types)];

$enemies = [
    new Soldier(...$randed_spell, type: $randed_type),
    new Thief(...$randed_spell, type: $randed_type),
    new Wizard(...$randed_spell, type: $randed_type)
];
$enemy = $enemies[array_rand($enemies)];
$heal_below = $enemy->getHealth() * 0.15;
$userBaseHealth = $user->getHealth();

while (true) {
    $notEnoughtMana = false;
    switch (showUserMenu($user, $enemy)) {
        case 1:
            $health = $enemy->getHealth();
            $user->attack($enemy);
            break;
        case 2:
            if ($user->getMana() < $user->getAtkSpell()->getCost()) {
                echo "You do not have enought mana to use this spell !";
                $notEnoughtMana = true;
                break;
            }
            $health = $enemy->getHealth();
            $user->attackSpell($enemy);
            break;
        case 3:
            if ($user->getMana() < $user->getHealSpell()->getCost()) {
                echo "You do not have enought mana to heal !";
                $notEnoughtMana = true;
                break;
            }
            $health = $user->getHealth();
            if ($health < $userBaseHealth - $user->getHealSpell()->getValue())
            {
                $user->heal();
                echo "You healed yourself of " . $user->getHealth() - $health . " HP !" . PHP_EOL;
            }
            else
            {
                echo "You cannot heal yourself !". PHP_EOL;
                $notEnoughtMana = true;
            }
            break;
    }
    if ($notEnoughtMana) {
        continue;
    }
    $user->regenMana();

    if (
        $enemy->getHealth() < $heal_below &&
        $enemy->getMana() > $enemy->getHealSpell()->getCost()
    ) {
        echo $enemy . "just healed himself" . PHP_EOL;
        $enemy->heal();
    } else {
        switch (rand(1, 2)) {
            case 1:
                echo "The enemy attacks you !" . PHP_EOL;
                $enemy->attack($user);
                break;
            case 2:
                if ($enemy->getMana() > $enemy->getAtkSpell()->getCost()) {
                    echo "The enemy use his spell !" . PHP_EOL;
                    $enemy->attackSpell($user);
                } else {
                    echo "The enemy attacks you !" . PHP_EOL;
                    $enemy->attack($user);
                }
        }
    }
    $enemy->regenMana();

    $userAlive = $user->isAlive();
    $enemyAlive = $enemy->isAlive();

    if ($userAlive && !$enemyAlive) {
        echo PHP_EOL . "You won the battle ! Congrats :)" . PHP_EOL;
        break;
    } else if (!$userAlive && $enemyAlive) {
        echo PHP_EOL . "You died :(" . PHP_EOL;
        break;
    }
}
