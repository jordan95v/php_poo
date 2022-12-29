<?php

require_once('./autoload.php');
require_once('./functions.php');

use Classes\Characters\Soldier;
use Classes\Characters\Thief;
use Classes\Characters\Wizard;
use Classes\Enum\Type;
use Classes\Spell\FireBall;


$fireBall = new FireBall();
$soldier = new Thief($fireBall, null, null, Type::FIRE);
$secondSoldier = new Thief($fireBall, null, null, Type::PLANT);

$soldier->attack($secondSoldier);

echo $secondSoldier->getHealth();