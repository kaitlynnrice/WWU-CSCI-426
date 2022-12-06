<?php 

include_once 'presets.php';
session_start();


include 'html/header.html';
// include 'html/form.html';




if( isset($_GET['roomID']) ){
    $roomID = $_GET['roomID'];
    $isFav = $_SESSION['rooms3'][$roomID]->isFav;
    $tags = $_SESSION['rooms3'][$roomID]->features;
    $all_reservations = $_SESSION['reservations'];
}

include 'php/room_page.php';
include 'php/handle_fav.php';




include 'php/calendar.php';
include 'html/footer.html';
?>