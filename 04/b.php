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

    // Check for six zeros
    $match = str_starts_with($hash, "000000");
} while (!$match);

echo $counter;