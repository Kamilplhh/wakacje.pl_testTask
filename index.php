<?php 
$file = "https://gist.githubusercontent.com/miisieq/379bb51bb376b2fd597d19281a7bbff6/raw/573dd374139cc72ffb555fef80af8263d2d26cd2/php_internship_data.csv";

$dataArray = array_map("str_getcsv", file($file));

//name section
$name = array_column($dataArray, 0);

$nameCount = array_count_values($name);
arsort($nameCount);
$topNames = array_slice($nameCount, 0, 10);

print_r($topNames);
echo '<br>';

//
//date section (bonus)
$date = array_column($dataArray, 1);

foreach($date as $row){
    if($row > "2000-01-01"){
        $newRow = date("d.m.Y", strtotime($row));
        $dateArray[] = $newRow;
    }
}

$dateCount = array_count_values($dateArray);
arsort($dateCount);
$topDates = array_slice($dateCount, 0, 10);

print_r($topDates);