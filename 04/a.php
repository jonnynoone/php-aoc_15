<?php

$secret_key = "bgvyzdsv";
$counter = 0;
$match = 0;

do {
    $counter++;

    // Secret key + current decimal number
    $input = $secret_key . strval($counter);

    // Generate MD5 hash
    $hash = md5($input);

    // Check for five zeros
    $match = str_starts_with($hash, "00000");
} while (!$match);

echo $counter;