<?php

require "functions.php";

$words = ['HELLO', 'HUMAN', 'WELCOME', 'CONGRATULATION'];
$key = rand(1, 26);
$word1 = $words[rand(0,count($words)-1)];
$word1c = crypting($word1, $key);

echo $word1 . ' - ' . $key . ' - ' . $word1c;
