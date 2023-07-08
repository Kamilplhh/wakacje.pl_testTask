<?php
//get a file and turn csv into proper array
$file = "https://gist.githubusercontent.com/miisieq/379bb51bb376b2fd597d19281a7bbff6/raw/573dd374139cc72ffb555fef80af8263d2d26cd2/php_internship_data.csv";
$dataArray = array_map("str_getcsv", file($file));

//name section
$name = array_column($dataArray, 0);

//count how many times values reapeats, then slice this array into max of 10 objects
$nameCount = array_count_values($name);
arsort($nameCount);
$topNames = array_slice($nameCount, 0, 10);

//method 1. 
//modify name array into array that match task requirments with array_map
$topNames = array_combine(array_map('mb_strtolower', array_keys($topNames)), $topNames);
$topNames = array_combine(array_map('ucfirst', array_keys($topNames)), $topNames);

//print data
echo '<div style="float:left; width: 50%; text-align:center;">';
$x = 1;
foreach ($topNames as $key => $row) {
    echo "$x. $key appears $row times<br>";
    $x++;
}
echo '</div>';

//date section (bonus)
$date = array_column($dataArray, 1);

//method 2.
//modify date array into array that match task requirments with foreach loop
foreach ($date as $row) {
    if ($row > "2000-01-01") {
        $newRow = date("d.m.Y", strtotime($row));
        $dateArray[] = $newRow;
    }
}

$dateCount = array_count_values($dateArray);
arsort($dateCount);
$topDates = array_slice($dateCount, 0, 10);

echo '<div style="float:left; width: 50%; text-align:center;">';
$y = 1;
foreach ($topDates as $key => $row) {
    echo "$y. $key appears $row times<br>";
    $y++;
}
echo '</div>';

//Requirements have been done using 2 different methods, with a loop that is more scalable and with array_combine just to show that there was atleast 2 possible way to get the result