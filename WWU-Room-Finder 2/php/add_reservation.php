<?php 

if( isset($_POST['add_reservation']) ){

    $reserver_name = $_POST["name"];
    $roomID = $_POST["roomID"];
    $date = $_POST["date"];
    $startTime = $_POST["startTime"];
    $endTime = $_POST["endTime"];

    $new_reservation = new Reservation($reserver_name, $roomID, $date, $startTime, $endTime);
    $avail_rooms[$roomID]->add_reservation($new_reservation); 
    array_push($_SESSION['reservations'], $new_reservation);

    header("Location: ../reservations.php");

  exit;
}

?>