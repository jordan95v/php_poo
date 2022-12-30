<?php

require_once('./autoload.php');
require_once('./functions.php');

use Classes\Characters\Soldier;
use Classes\Characters\Thief;
use Classes\Characters\Wizard;
use Classes\Enum\Type;
use Classes\Spell\FireBall;

while (true){
    echo "Hello adventurer, please select your character's class !" . PHP_EOL;
    echo "1 - Soldier" . PHP_EOL . "2 - Thief" . PHP_EOL . "3 - Wizard" . PHP_EOL;
    $class_choices = readline("Enter your choice: ");
    
    if ($class_choices <= 3 && $class_choices > 0)
    {
        echo PHP_EOL;
        break;
    }
    echo PHP_EOL . "Please select a correct answer." . PHP_EOL;
}

while (true)
{
    echo "Great, now select your type !" . PHP_EOL;
    echo "1 - Fire" . PHP_EOL . "2 - Water" . PHP_EOL . "3 - Plant" . PHP_EOL;
    $class_type = readline("Enter your choice: ");

    if ($class_type <= 3 && $class_type > 0)
    {
        break;
    }
    echo PHP_EOL . "Please select a correct answer." . PHP_EOL;
}

switch ($class_type)
{
    case 1:
        $type = Type::FIRE;
        break;
    case 2:
        $type = Type::WATER;
        break;
    case 3:
        $type = Type::PLANT;
        break;
    default:
        echo "Please select a correct answer." . PHP_EOL;
        break;
}
    
