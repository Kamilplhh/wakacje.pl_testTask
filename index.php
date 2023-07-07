<?php 
$file = "https://gist.githubusercontent.com/miisieq/379bb51bb376b2fd597d19281a7bbff6/raw/573dd374139cc72ffb555fef80af8263d2d26cd2/php_internship_data.csv";

$dataArray = array_map("str_getcsv", file($file));

var_dump($dataArray);