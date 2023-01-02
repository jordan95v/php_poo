<?php

require_once('./autoload.php');
require_once('./functions.php');

use Classes\Characters\Soldier;
use Classes\Characters\Thief;
use Classes\Characters\Wizard;
use Classes\Enum\Type;


$SPELL_TYPE = ["offensive", "defensive", "healing"];

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

$randed_spell = [ATK_SPELL[array_rand(ATK_SPELL)], DEF_SPELL[array_rand(DEF_SPELL)], HEAL_SPELL[array_rand(HEAL_SPELL)]];
$types = Type::cases();
$randed_type = $types[array_rand($types)];

$enemies = [
    new Soldier(...$randed_spell, type: $randed_type),
    new Thief(...$randed_spell, type: $randed_type),
    new Wizard(...$randed_spell, type: $randed_type)
];
$enemy = $enemies[array_rand($enemies)];

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
            $health = $player->getHealth();
            $user->heal();
            echo "You healed yourself of " . $player->getHealth() - $health . " HP !" . PHP_EOL;
            break;
    }
    if ($notEnoughtMana) {
        continue;
    }
    $user->regenMana();

    if (
        $enemy->getHealth() < $enemy->getHealth() * 0.15 &&
        $enemy->getMana() < $enemy->getHealSpell()->getCost()
    ) {
        $enemy->heal();
    } else {
        switch (rand(1, 2)) {
            case 1:
                if ($enemy->getMana() < $enemy->getAtkSpell()->getCost()) {
                    echo "The enemy attacks you !" . PHP_EOL;
                    $enemy->attack($player);
                } else {
                    echo "The enemy use his spell !" . PHP_EOL;
                    $enemy->attackSpell($user);
                }
                break;
            case 2:
                echo "The enemy use his spell !" . PHP_EOL;
                $enemy->attackSpell($user);
        }
    }
    $enemy->regenMana();

    $userAlive = $user->isAlive();
    $enemyAlive = $enemy->isAlive();

    if ($userAlive && !$enemyAlive) {
        echo PHP_EOL . "You won the battle ! Congrats :)" . PHP_EOL;
        break;
    } else if (!$userAlive && $enemyAlive) {
        echo "You died :(";
        break;
    }
}
