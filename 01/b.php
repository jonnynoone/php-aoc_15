<?php

// Starting floor
$floor = 0;

// Read input
$file = fopen('data.txt', 'r');
$input = fread($file, filesize('data.txt'));
fclose($file);

// Parse instructions
for($i = 0; $i < strlen($input); $i++) {
    if($input[$i] === '(') {
        $floor++;
    } elseif($input[$i] === ')') {
        $floor--;
    }

    if($floor === -1) {
        $position = $i + 1;
        break;
    }
}

echo $position;