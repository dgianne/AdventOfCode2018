<?php

$input = file("input.txt");
$processedIds = [];
$firstCorrectId = null;
$secondCorrectId = null;
$found = false;

foreach ($input as $boxId) {
    foreach ($processedIds as $id)
    {
        $differences = getDifferences($boxId, $id);

        if (count($differences) === 1) {
            $firstCorrectId = $id;
            $secondCorrectId = $boxId;
            $found = true;
            break;
        }
    }

    if ($found) {
        break;
    }

    $processedIds[] = $boxId;
}

if (!$found) {
    throw new Exception('No correct ids found in the input data.');
}

$finalResult = removeCharacterAtIndex($firstCorrectId, $differences[0]);

echo "The first correct Id is $firstCorrectId\n";
echo "The second correct Id is $secondCorrectId\n";
echo "The letters present in both Ids are $finalResult\n";

function getDifferences(string $str1, string $str2) : array
{
    $differences = [];
    for ($i = 0; $i < strlen($str1); $i++) {
        if ($str1[$i] !== $str2[$i]) {
            $differences[] = $i;
        }
    }

    return $differences;
}

function removeCharacterAtIndex(string $string, int $index) : string
{
    $array = str_split($string);
    unset($array[$index]);
    return implode($array);
}
