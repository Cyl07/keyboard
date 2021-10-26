<?php

require_once __DIR__ . '/../vendor/autoload.php';
use App\AZERTYKeyboard;

$keyboard = new AZERTYKeyboard();

$keyboard->write("is egestas. ");
foreach($keyboard->getKeysStats(true, true) as $key => $value){
    echo "the key $key as been pressed $value times\n";
}

foreach($keyboard->getFingersStats() as $key => $value){
    echo "$key :\n  $value[0] %\n  $value[1] time\n  $value[2] cm\n";
}