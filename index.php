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

$enemies = [new Soldier(), new Thief(), new Wizard()];
$enemy = $enemies[array_rand($enemies)];

while (true) {
    switch (showUserMenu($user, $enemy)) {
        case 1:
            break;
        case 2:
            break;
        case 3:
            break;
    }
}
