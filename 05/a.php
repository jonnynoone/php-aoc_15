<?php

$file = fopen('data.txt', 'r');
$input = fread($file, filesize('data.txt'));
fclose($file);

$strings = explode("\n", $input);

$valid_strings = 0;

foreach($strings as $string) {
    if(check_status($string)) {
        $valid_strings++;
    }
}

echo $valid_strings;

function check_status($str) {
    if (
        three_vowels($str) &&
        double_letter($str) &&
        no_forbidden_string($str)
    ) {
        return true;
    } else {
        return false;
    }
}

function three_vowels($str) {
    $counter = 0;

    for($i = 0; $i < strlen($str); $i++) {
        switch ($str[$i]) {
            case 'a':
            case 'e':
            case 'i':
            case 'o':
            case 'u':
                $counter++;
                break;
        }
    }

    return $counter >= 3;
}

function double_letter($str) {
    $letter = $str[0];

    for($i = 1; $i < strlen($str); $i++) {
        if($letter === $str[$i]) {
            return true;
        } else {
            $letter = $str[$i];
        }
    }
}

function no_forbidden_string($str) {
    if (
        str_contains($str, "ab") ||
        str_contains($str, "cd") ||
        str_contains($str, "pq") ||
        str_contains($str, "xy")
    ) {
        return false;
    } else {
        return true;
    }
}