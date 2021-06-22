<?php
include "../auto/autoload.php";

//headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

$id = $_GET['id'];


$Rdv = new Rdv;
$rows = $Rdv->DeleteRdv($id);




