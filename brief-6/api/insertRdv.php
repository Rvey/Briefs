<?php
include 'cors.php';
include "../auto/autoload.php";



$rdv_id = $_GET['rdv_id'];
$date = $_GET['date'];
$time = $_GET['time'];
$token = $_GET['token'];


$insertDate = new Rdv;
$table = $insertDate->insertDate($rdv_id, $time, $date, $token);



