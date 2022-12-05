<?php 

include_once 'presets.php';
session_start();

$avail_rms2 = $_SESSION['rooms3'];


include 'html/header.html';

include 'html/form.html';
include 'php/rooms.php';

include 'php/handle_fav.php';


include 'html/footer.html';
?>
