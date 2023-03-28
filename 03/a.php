<?php

$file = fopen('data.txt', 'r');
$input = fread($file, filesize('data.txt'));
fclose($file);

$location = [0,0];

$visited = array();
array_push($visited, $location);

for($i = 0; $i < strlen($input); $i++) {
    switch ($input[$i]) {
        case '^':
            $location[1]++;
            break;
        case '>':
            $location[0]++;
            break;
        case 'v':
            $location[1]--;
            break;
        case '<':
            $location[0]--;
            break;
    }

    if(!in_array($location, $visited)) {
        array_push($visited, $location);
    }
}

echo count($visited);