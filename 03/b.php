<?php

$file = fopen('data.txt', 'r');
$input = fread($file, filesize('data.txt'));
fclose($file);

$santa_location = [0,0];
$robot_location = [0,0];

$visited = array();
array_push($visited, [0,0]);

for($i = 0; $i < strlen($input); $i++) {
    if($i % 2 === 0) {
        process_move($santa_location, $input[$i]);
    } else {
        process_move($robot_location, $input[$i]);
    }
}

function process_move(&$location, $char) {
    global $visited;

    switch ($char) {
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