<?php

$total_paper = 0;

// Get raw input
$file = fopen('data.txt', 'r');
$input = fread($file, filesize('data.txt'));
fclose($file);

// Parse data into lines
$presents = explode("\n", $input);

foreach($presents as $present) {
    $dimensions = explode('x', $present);
    
    $length = $dimensions[0];
    $width  = $dimensions[1];
    $height = $dimensions[2];
    
    $sides = array(
        $length * $width,
        $width * $height,
        $length * $height
    );
    
    $surface_area = 2 * ($sides[0] + $sides[1] + $sides[2]);
    $smallest_side =  min($sides);
    
    $paper = $surface_area + $smallest_side;
    $total_paper += $paper;
}

echo $total_paper;