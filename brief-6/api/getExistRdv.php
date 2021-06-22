<?php
include "../auto/autoload.php";

//headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

$token = $_GET['token'];


$Rdv = new Rdv;
$rows = $Rdv->getUserRdv($token);


    $getRdv_arr =[];
    foreach ( $rows as $row ) {
        $getRdv = [
            'id' => $row['id'],
            'time' => $row['time'],
            'date' => $row['date']
        ];
        array_push($getRdv_arr , $getRdv);

    }
    echo json_encode($getRdv_arr);
