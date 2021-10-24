<?php

require_once __DIR__ . '/../vendor/autoload.php';
use App\AZERTYKeyboard;

$keyboard = new AZERTYKeyboard();

$keyboard->write("Here is a great Example

You have a fruit in your hand");

foreach($keyboard->getKeysStats(true, true) as $key => $value){
    echo "the key $key as been pressed $value times\n";
}