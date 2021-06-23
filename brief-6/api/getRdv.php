<?php
include "../auto/autoload.php";

//headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

$date = $_GET['date'];


$Rdv = new Rdv;
$table = $Rdv->getRdv($date);

if (sizeof($table) != 0){
    $getRdv_arr =[];
    foreach ( $table as $row ) {
        $getRdv = [
            'Rdv_id' => $row['rdv_id']
        ];
        array_push($getRdv_arr , $getRdv);

    }
    echo json_encode($getRdv_arr);
}else{
    echo json_encode('dateSelected');
}