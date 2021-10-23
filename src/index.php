<?php

require_once __DIR__ . '/../vendor/autoload.php';
use App\Key;
use App\Character;
use App\Keyboard;

$input = str_split("ahahah", 1);

$keyA = new Key("letterA", [0,0]);
$keyH = new Key("letterH", [1,1]);

$charA = new Character("a", [$keyA]);
$charH = new Character("h", [$keyH]);

$keayboard = new Keyboard([$keyA, $keyH]);

foreach($input as $char){
    if ($charA->getChar() === $char){
        echo "found a\n";
    }
}