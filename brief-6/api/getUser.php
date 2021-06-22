<?php
include 'cors.php';
include "../auto/autoload.php";

//headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

$email = $_GET['email'];
$token = $_GET['token'];


$getuser = new User;
$rows = $getuser->getUser($email , $token);




if (sizeof($rows) != 0){
    $getusers_arr =[];
    foreach ( $rows as $row ) {
        $getusers = [
            'token' => $row['token'],
            'email' => $row['email']
        ];
        array_push($getusers_arr , $getusers);

    }
    echo json_encode($getusers_arr);
}else{
    echo json_encode('error');
}
