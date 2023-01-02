<?php

# todo
# Finir de créer les spells
# Finir les armes

require_once('./autoload.php');
require_once('./functions.php');

use Classes\Abstracts\Spell;
use Classes\Characters\Soldier;
use Classes\Characters\Thief;
use Classes\Characters\Wizard;
use Classes\Enum\Type;
use Classes\Spell\FireBall;
use Classes\Spell\LaserBeam;
use Classes\Spell\Sunfire;
use Classes\Spell\Thornmail;
use Classes\Spell\Warmog;
use Classes\Spell\WaterCannon;

$SPELL_TYPE = ["offensive", "defensive", "healing"];

function characeterSelection(): int
{
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

function createSpell(string $spellType, int $choice): ?Spell
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
                    break;
                case 2:
                    break;
                case 3:
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

$class_choice = characeterSelection();
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
        $user = new Soldier(...$spells);
        break;

    case 2:
        $user = new Thief(...$spells);
        break;

    case 3:
        $user = new Wizard(...$spells);
        break;
}

$soldier = new Soldier();
$thief = new Thief();
$wizard = new Wizard();

$enemies = [$soldier, $thief, $wizard];
$enemy = array_rand($enemies);

echo $enemy;
