<?php 


// /////////////////////////// USING THIS to initialize rooms/reservations ////////////////////////////////////////////////////////

// session_start();

// include_once 'presets.php';

// initialization of rooms in system
// $cf105tags = array("Projector", "Sink", "Owl-Camera");
// $cf105 = new Room("CF 105", "Communications", 70, $cf105tags, "tommorow");

// $cf102tags = array("Demo Table", "Sink", "Owl-Camera");
// $cf102 = new Room("CF 102", "Communications", 102, $cf102tags, "3:00pm");

// $cf115tags = array("Projector");
// $cf115 = new Room("CF 115", "Communications", 142, $cf115tags, "12:00pm");

// // initialization of 'class' classroom reservations
// $reservation105_1 = new Reservation("class 1", "CF 105", "2022-12-06", "12:00:00", "1:00:00");
// $cf105->add_reservation($reservation105_1);

// $reservation105_2 = new Reservation("class 1", "CF 105", "2022-12-09", "12:00:00", "1:00:00");
// $cf105->add_reservation($reservation105_2);



// // holds rooms in system
// $_SESSION['rooms3'] = array("CF 105" => $cf105, "CF 102" => $cf102, "CF 115" => $cf115);

// // holds current user favorites
// $_SESSION['favs'] = array();

// // holds current user reservations
// $_SESSION['reservations'] = array();

// // holds class reservations
// $_SESSION['classReservations'] = array();
// array_push($_SESSION['classReservations'], $reservation105_1);
// array_push($_SESSION['classReservations'], $reservation105_2);


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

require_once('initializeSite.php');
initialize();

$avail_rms2 = $_SESSION['rooms3'];

include 'html/header.html';
include 'html/form.html';
include 'html/footer.html';
?>