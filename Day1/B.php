<?php

$frequency = 0;
$frequencies = [0 => 1];
$repeat = false;


$input = fopen("input.txt", 'r');

while (!$repeat) {
    $shift = fgets($input);
    if ($shift === false) {
        $input = fopen("input.txt", 'r');
        $shift = fgets($input);
    }

    $frequency += (int)$shift;

    if (isset($frequencies[$frequency])) {
        $repeat = true;
    } else {
        $frequencies[$frequency] = 1;
    }
}

echo "The first frequency reached twice is: $frequency\n";
