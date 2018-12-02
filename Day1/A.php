<?php

$frequency = 0;

$input = fopen("input.txt", 'r');

while ($shift = fgets($input)) {
    $frequency += (int)$shift;
}

echo "The ending frequency is: $frequency\n";
