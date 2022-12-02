<?php 


// /////////////////////////// USING THIS to initialize rooms/reservations ////////////////////////////////////////////////////////
session_start();

include_once 'presets.php';

$cf105tags = Array("Projector", "Sink", "Owl-Camera");
$cf105 = new Room("CF 105", "Communications", 70, $cf105tags, "tommorow");

$cf102tags = Array("Demo Table", "Sink", "Owl-Camera");
$cf102 = new Room("CF 102", "Communications", 102, $cf102tags, "3:00pm");

$cf115tags = Array("Projector");
$cf115 = new Room("CF 115", "Communications", 142, $cf115tags, "12:00pm");

$reservation115_1 = new Reservation("Billy Bob","CF 115", "11/27/2022", "12:00:00", "1:00:00");
$cf115->add_reservation($reservation115_1);



$_SESSION['rooms3'] = array("CF 105"=>$cf105, "CF 102"=>$cf102, "CF 115"=>$cf115);

$_SESSION['favs'] = array();
// array_push($_SESSION['favs'], $cf115);

$_SESSION['reservations'] = array();
array_push($_SESSION['reservations'], $reservation115_1);

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


$avail_rms2 = $_SESSION['rooms3'];

include 'html/header.html';
include 'html/form.html';
include 'html/footer.html';
?>