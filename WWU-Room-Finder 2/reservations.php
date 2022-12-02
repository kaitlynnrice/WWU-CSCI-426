<?php 

include_once 'presets.php';
session_start();

$avail_rooms = $_SESSION['rooms3'];
$all_reservations = $_SESSION['reservations'];


// add new reservation
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (is_null($_POST["name"])) {
        return;
    } else {
        $reserver_name = $_POST["name"];
        $roomID = $_POST["roomID"];
        $date = $_POST["date"];
        $startTime = $_POST["startTime"];
        $endTime = $_POST["endTime"];
    
        $new_reservation = new Reservation($reserver_name, $roomID, $date, $startTime, $endTime);
        $avail_rooms[$roomID]->add_reservation($new_reservation); 
        array_push($_SESSION['reservations'], $new_reservation);
    
        $_POST = array();
        
        echo "<meta http-equiv='refresh' content='0'>";
    }
}



include 'html/header.html';

include 'php/usr_reservations.php';
include 'php/handle_fav.php';


include 'html/footer.html';
?>