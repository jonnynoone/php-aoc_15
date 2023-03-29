<?php

// Create lights grid
$grid = array_fill(0, 1000, array_fill(0, 1000, 0));

// Get input
$file = fopen('data.txt', 'r');
$input = fread($file, filesize('data.txt'));
fclose($file);

$instructions = explode("\n", $input);

foreach($instructions as $line) {
    // Begin parsing string
    $bang = explode(' ', $line);
    
    // Grab command from input
    $command = array_shift($bang);
    if ($command === "turn") {
        $command .= " " . array_shift($bang);
    }
    
    // Get coordinates
    $start_point = explode(',', array_shift($bang));
    $end_point = explode(',', array_pop($bang));
    
    change_lights($command, $start_point, $end_point);
}
    
echo count_lights();

function change_lights($cmd, $start, $end) {
    global $grid;

    for ($i = $start[0]; $i <= $end[0]; $i++) {
        for ($j = $start[1]; $j <= $end[1]; $j++) {
            if ($cmd === "turn on") {
                $grid[$i][$j] = 1;
            } elseif ($cmd === "turn off") {
                $grid[$i][$j] = 0;
            } elseif ($cmd === "toggle") {
                $grid[$i][$j] = !$grid[$i][$j];
            }
        }
    }
}

function count_lights() {
    global $grid;

    $count = 0;
    for ($i = 0; $i <= 999; $i++) {
        for ($j = 0; $j <= 999; $j++) {
            if ($grid[$i][$j]) {
                $count++;
            }
        }
    }

    return $count;
}