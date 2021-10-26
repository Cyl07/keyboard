<?php

require_once __DIR__ . '/../vendor/autoload.php';
use App\Model\AZERTYKeyboard;

$keyboard = new AZERTYKeyboard();

$keyboard->write("Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur velit turpis, venenatis non ultricies a, faucibus posuere ligula. Pellentesque vel iaculis eros. Mauris velit justo, facilisis non scelerisque tristique, tempus eu lacus. In consequat, diam vel semper tincidunt, nisi sapien varius lorem, non feugiat nibh nunc eu massa. Phasellus ut nisl sed enim congue pulvinar. Curabitur at vulputate eros, quis ultricies nunc. Maecenas eu metus commodo, lacinia nulla ut, malesuada mi. Donec augue nibh, interdum nec diam vitae, cursus faucibus massa.

Donec dui urna, varius a dictum ut, dignissim vel eros. Donec tempus libero turpis, sed porta sapien rutrum eu. Morbi a justo ut eros gravida volutpat. Maecenas eleifend fringilla varius. Suspendisse euismod lacus augue, et molestie est ornare at. Quisque velit orci, pulvinar sed placerat eu, congue quis lacus. Nunc consequat erat enim, eu varius leo rutrum eget. Vestibulum gravida vulputate ipsum.

In hac habitasse platea dictumst. Sed posuere non ex et condimentum. Nam dui dolor, accumsan eu augue ac, blandit pulvinar sem. Quisque sit amet dapibus magna. In scelerisque, nisi id lacinia ullamcorper, purus orci vestibulum quam, a aliquam justo enim a massa. Curabitur commodo, leo nec maximus gravida, enim libero euismod ex, et pellentesque nisi tortor eu quam. Maecenas in risus augue. Sed porttitor, nunc non ornare vulputate, felis dolor imperdiet tellus, ac dapibus eros est id nibh. Sed consectetur tortor sed tellus feugiat, in mollis libero ultrices. Etiam dictum aliquet leo. Mauris venenatis sem et ipsum aliquam, ac aliquet odio efficitur. Nam consectetur lorem id faucibus aliquet. Duis malesuada quam ut augue euismod, id posuere odio pellentesque.

Integer maximus lacus eu erat auctor convallis. Phasellus nibh odio, eleifend sed blandit at, dignissim sed sem. Fusce dignissim, sem id tincidunt facilisis, tellus sem ullamcorper velit, ut sagittis massa est blandit risus. Etiam ut diam tellus. Curabitur id sem nec urna fermentum varius eu id eros. Vestibulum rhoncus turpis eget risus suscipit fringilla. Nunc eget cursus elit. Vivamus vel ex semper, pellentesque lacus a, efficitur risus. Phasellus at ultricies tellus. Aenean placerat nulla elit, eu finibus elit auctor et. Maecenas dictum rutrum arcu, nec efficitur risus imperdiet vel. Ut consequat, leo eget lobortis dictum, ante metus aliquet urna, vel dictum eros ligula nec lorem. Nulla tincidunt leo et ipsum eleifend commodo. Sed convallis vel est et blandit.

Phasellus condimentum erat ante, at convallis sapien tristique ut. Vestibulum ante felis, eleifend eget nisl et, laoreet dignissim sem. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Mauris ultrices sagittis vestibulum. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Integer quis nunc id diam rutrum interdum. Suspendisse non mollis lectus, sit amet rhoncus dolor. Proin tincidunt consequat vehicula. Quisque consequat elit eget urna consectetur, at vehicula ante pharetra. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. ");
foreach($keyboard->getKeysStats(true, true) as $key => $value){
    echo "the key $key as been pressed $value times\n";
}

foreach($keyboard->getFingersStats() as $key => $value){
    echo "$key :\n  $value[0] %\n  $value[1] time\n  $value[2] cm\n";
}