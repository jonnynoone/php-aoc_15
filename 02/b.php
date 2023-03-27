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

    if($length >= $width && $length >= $height) {
        $perimeter = 2 * $width + 2 * $height;
    } elseif($width >= $length && $width >= $height) {
        $perimeter = 2 * $length + 2 * $height;
    } elseif($height >= $width && $height >= $length) {
        $perimeter = 2 * $length + 2 * $width;
    }

    $bow = $length * $width * $height;
    
    $paper = $perimeter + $bow;
    $total_paper += $paper;
}

echo $total_paper;