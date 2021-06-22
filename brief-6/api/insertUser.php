<?php
include 'cors.php';
//headers
header('Access-Control-Allow-Origin: *');


include "../auto/autoload.php";

$Name = $_GET['Name'];
$lastName = $_GET['lastName'];
$email = $_GET['email'];


$token = tokenGen($Name, $email);

$insertUser = new User;
$rows = $insertUser->insertUser($Name, $lastName, $email, $token);

echo json_encode($token);

function tokenGen($Name, $email): string
{
    $s = '';
    $e = '';
    for ($i = 0; $i < 4; $i++) {
        $s = $s . $Name[$i];
        $e = $e . $email[$i];
    }

    $randomT = rand() * 200000;

    return $s . $randomT . $e;
}
