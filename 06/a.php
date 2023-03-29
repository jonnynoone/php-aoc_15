<?php

$grid = array_fill(0, 1000, array_fill(0, 1000, 0));

$input = "turn on 0,0 through 999,999";

$bang = explode(' ', $input);

// Grab command from input
$command = array_shift($bang);
if ($command === "turn") {
    $command .= " " . array_shift($bang);
}

// Get coordinates
$start_point = array_shift($bang);
$end_point = array_pop($bang);

echo "START: " . $grid[234][771] . "\n";

if ($command === "turn on") {
    lights_on($start_point, $end_point);
}

echo "END: " . $grid[234][771];

function lights_on($start, $end) {
    global $grid;

    for ($i = $start[0]; $i <= $end[0]; $i++) {
        for ($j = $start[1]; $j <= $end[1]; $j++) {
            $grid[$i][$j] = 1;
        }
    }
}

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