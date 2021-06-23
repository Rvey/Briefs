<?php
include "../auto/autoload.php";

//headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

$token = $_GET['token'];

// we create a new instance of rdv class
//and we store it in the Rdv variable
$Rdv = new Rdv;

// create row var and stock the result function that we pass token in to
$table = $Rdv->getUserRdv($token);


    $getRdv_arr =[];
    foreach ( $table as $row ) {
        $getRdv = [
            'id' => $row['id'],
            'time' => $row['time'],
            'date' => $row['date']
        ];
        array_push($getRdv_arr , $getRdv);

    }
    echo json_encode($getRdv_arr);
