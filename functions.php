<?php

use Classes\Abstracts\Character;
use Classes\Spell\FireBall;
use Classes\Spell\Heal;
use Classes\Spell\LaserBeam;
use Classes\Spell\Rebirth;
use Classes\Spell\Restauration;
use Classes\Spell\Sunfire;
use Classes\Spell\Thornmail;
use Classes\Spell\Warmog;
use Classes\Spell\WaterCannon;
use Classes\Abstracts\Spell;

define("ATK_SPELL", [new FireBall(), new WaterCannon(), new LaserBeam()]);
define("DEF_SPELL", [new Sunfire(), new Thornmail(), new Warmog()]);
define("HEAL_SPELL", [new Heal(), new Rebirth(), new Restauration()]);

function chance($percentage): bool
{
    return rand() % 100 < $percentage;
}

function percentToMultiplier($percentage): float
{
    return $percentage / 100 + 1;
}

function characterSelection(): int
{
    echo PHP_EOL . "========== RPG GAMES ==========" . PHP_EOL . PHP_EOL;
    while (true) {
        echo "Hello adventurer, please select your character's class !" . PHP_EOL;
        echo "1 - Soldier" . PHP_EOL . "2 - Thief" . PHP_EOL . "3 - Wizard" . PHP_EOL;
        $class_choice = readline("Enter your choice: ");

        if ($class_choice <= 3 && $class_choice > 0) {
            echo PHP_EOL;
            return $class_choice;
        }
        echo PHP_EOL . "Please select a correct answer." . PHP_EOL;
    }
}

function typeSelection(): int
{
    while (true) {
        echo "Great, now select your type !" . PHP_EOL;
        echo "1 - Fire" . PHP_EOL . "2 - Water" . PHP_EOL . "3 - Plant" . PHP_EOL;
        $class_type = readline("Enter your choice: ");

        if ($class_type <= 3 && $class_type > 0) {
            echo PHP_EOL;
            return $class_type;
        }
        echo PHP_EOL . "Please select a correct answer." . PHP_EOL;
    }
}

function createSpell(string $spellType, int $choice): Spell
{
    switch ($spellType) {
        case "offensive":
            switch ($choice) {
                case 1:
                    return new FireBall();
                    break;
                case 2:
                    return new WaterCannon();
                    break;
                case 3:
                    return new LaserBeam();
                    break;
            }
        case "defensive":
            switch ($choice) {
                case 1:
                    return new Thornmail();
                    break;
                case 2:
                    return new Sunfire();
                    break;
                case 3:
                    return new Warmog();
                    break;
            }
        case "healing":
            switch ($choice) {
                case 1:
                    return new Heal();
                    break;
                case 2:
                    return new Rebirth();
                    break;
                case 3:
                    return new Restauration();
                    break;
            }
    }
}

function spellSelection(string $spellType): Spell
{
    while (true) {
        echo "Now select your " . $spellType . " spell !" . PHP_EOL;
        switch ($spellType) {
            case "offensive":
                echo "1 - Fire Ball" . PHP_EOL . "2 - Water Cannon" . PHP_EOL . "3 - Laser Beam" . PHP_EOL;
                break;
            case "defensive":
                echo "1 - Thornmail" . PHP_EOL . "2 - Sunfire Cape" . PHP_EOL . "3 - Warmog" . PHP_EOL;
                break;
            case "healing":
                echo "1 - Heal" . PHP_EOL . "2 - Rebirth" . PHP_EOL . "3 - Restauration" . PHP_EOL;
                break;
        }
        $spell_choice = readline("Enter your choice: ");

        if ($spell_choice <= 3 && $spell_choice > 0) {
            echo PHP_EOL;
            return createSpell($spellType, $spell_choice);
        }
        echo PHP_EOL . "Please select a correct answer." . PHP_EOL;
    }
}

function showUserMenu(Character $player, Character $enemy): int
{
    echo PHP_EOL . "========== CHOOSE YOUR ACTION ==========" . PHP_EOL;
    echo "You                | Enemy              " . PHP_EOL;
    echo "Class: " . $player . "     | Class: " . $enemy . PHP_EOL;
    echo "Health: " . $player->getHealth() . "         | Health: " . $enemy->getHealth() . PHP_EOL;
    echo "Mana: " . $player->getMana() . "           | Mana: " . $enemy->getMana() . PHP_EOL;
    echo "Type: " . $player->getType()->name . "         | Type: " . $enemy->getType()->name . PHP_EOL;
    echo "========================================" . PHP_EOL;
    echo "1 - Attack          3 - Heal" . PHP_EOL;
    echo "2 - Use spell" . PHP_EOL . PHP_EOL;

    while (true) {
        $choice = readline("Your choice: ");
        if ($choice <= 3 && $choice > 0) {
            echo PHP_EOL;
            return $choice;
        }
        echo PHP_EOL . "Please select a correct answer." . PHP_EOL;
    }
}
