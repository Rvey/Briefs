<?php
include "../auto/autoload.php";

//headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

$date = $_GET['date'];


$Rdv = new Rdv;
$rows = $Rdv->getRdv($date);

if (sizeof($rows) != 0){
    $getRdv_arr =[];
    foreach ( $rows as $row ) {
        $getRdv = [
            'Rdv_id' => $row['rdv_id']
        ];
        array_push($getRdv_arr , $getRdv);

    }
    echo json_encode($getRdv_arr);
}else{
    echo json_encode('dateSelected');
}