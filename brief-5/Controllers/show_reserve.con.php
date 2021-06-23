<?php
include '../includes/autoload.inc.php';
session_start();
if (!isset($_SESSION['id'])){
    header('location: ../Views/login.php');
}
function show_reservations()
{

    $sh = new User();
    $date = date('Y-m-d');

$show = $sh->get_reservation($_SESSION['id']);
    foreach ($show as $row) {
//             $date = 2021-05-28;
            $currentDate =  $row['check_out'] ;
          if ($date < $currentDate){
              echo '<div class="card" style="width: 18rem; border-bottom: 6px #0db30d solid">';
          }else{
              echo '<div class="card" style="width: 18rem; border-bottom: 6px red solid">';
          }


        echo '<div class="card-body">

        <h3 class="card-title " style="padding-bottom:23px; text-align: center"> Reservation :' . $row['id'] . '</h3>
        <h6 class="card-subtitle mb-2 text-muted">PRICE : </h6>
        <p class="card-text">' . $row['total'] . ' DH</p>

        <h6 class="card-subtitle mb-2 text-muted">CHECK IN  :</h6>
        <p class="card-text">' . $row['check_in'] . '</p>
        
        <h6 class="card-subtitle mb-2 text-muted">CHECK OUT  :</h6>
        <p class="card-text">' . $row['check_out'] . '</p>
    </div>

</div>' ;

    }

}
