<?php

$input = fopen("input.txt", 'r');
$twos = 0;
$threes = 0;

while ($boxId = fgets($input)) {
    $breakdown = getCharacterBreakdown($boxId);

    if (in_array(2, array_values($breakdown))) {
        $twos++;
    }
    if (in_array(3, array_values($breakdown))) {
        $threes++;
    }
}

$checksum = $twos * $threes;

echo "The checksum is $checksum\n";

function getCharacterBreakdown(string $id) : array
{
    $result = [];

    for ($i = 0; $i < strlen($id); $i++) {
        if (isset($result[$id[$i]])) {
            $result[$id[$i]]++;
        } else {
            $result[$id[$i]] = 1;
        }
    }

    return $result;
}
