<?php
$data = json_decode(file_get_contents("php://input"));
$request = $data->request;
if($request == 1){
    $LastName = $data->LastName;
    $token = $data->token;
    if($LastName=='test'&&$token=='test'){
        $response[] = array('status'=>1);
    }else{
        $response[] = array('status'=>0);
    }
    echo json_encode($response);
    exit;
}