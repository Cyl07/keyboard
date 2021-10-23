<?php

require_once __DIR__ . '/../vendor/autoload.php';
use App\Key;
use App\Character;
use App\Keyboard;

$src = "AhahAhahHAhaH";
$input = str_split($src, 1);

$keyA = new Key("A", [0,0]);
$keyH = new Key("H", [1,1]);
$keyShift = new Key("shift", [3,2]);

$chara = new Character("a", [$keyA]);
$charh = new Character("h", [$keyH]);
$charA = new Character("A", [$keyShift, $keyA]);
$charH = new Character("H", [$keyShift, $keyH]);

$caracList = [$chara, $charh, $charA, $charH];

$keayboard = new Keyboard([$keyA, $keyH, $keyShift]);

echo "To enter $src, you pressed: \n";
foreach($input as $char){
    foreach($caracList as $carac){
        if ($carac->getChar() === $char){
            foreach($carac->getKeys() as $key){
                echo $key->getName();
            }
            echo "\n";
        }
    }
}