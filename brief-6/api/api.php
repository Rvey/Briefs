<?php
include "../auto/autoload.php";

//headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');



$scheduls = new Schedule;
$rows = $scheduls->getData();

$scheduls_arr = array();

foreach ($rows as $row)
{
    $scheduls_row = array(
        'id' => $row['id'],
        'start' => $row['start_date'],
    );

    array_push($scheduls_arr,$scheduls_row);
}

echo json_encode($scheduls_arr);


