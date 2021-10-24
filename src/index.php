<?php

require_once __DIR__ . '/../vendor/autoload.php';
use App\KeyStats;
use App\Character;
use App\Keyboard;

$src = "AhahAhahHAhaH";
$input = str_split($src, 1);

$keyA = new KeyStats("A", [1,0]);
$keyH = new KeyStats("H", [1,1]);
$keyShift = new KeyStats("shift", [3,2]);

$chara = new Character("a", [$keyA]);
$charh = new Character("h", [$keyH]);
$charA = new Character("A", [$keyShift, $keyA]);
$charH = new Character("H", [$keyShift, $keyH]);

$caracList = [$chara, $charh, $charA, $charH];

$keyboard = new Keyboard([$keyA, $keyH, $keyShift], $caracList);

$keyboard->write("hAhaHHahHA");

var_dump($keyboard->getKeysStats());