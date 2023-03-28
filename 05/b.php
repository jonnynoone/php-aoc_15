<?php

$file = fopen('data.txt', 'r');
$input = fread($file, filesize('data.txt'));
fclose($file);

$strings = explode("\n", $input);

$counter = 0;
foreach($strings as $string) {
    if (is_nice($string)) {
        $counter++;
    }
}

echo $counter;

function is_nice($str) {
    return has_sandwich($str) && has_repeat_pair($str) ?: false;
}

function has_repeat_pair($str) {
    for($i = 0; $i < strlen($str); $i++) {
        $part = substr($str, $i, 2);

        if (substr_count($str, $part) >= 2) {
            return true;
        }
    }
    return false;
}

function has_sandwich($str) {
    for($i = 0; $i < strlen($str) - 2; $i++) {
        $letter = $str[$i];

        if($letter === $str[$i + 2]) {
            return true;
        }
    }

    return false;
}