<?php 
include_once 'presets.php';
session_start();
// include_once 'presets.php';

$avail_rms = $_SESSION['favs'];
// $tags = $_SESSION['tags'];


include 'html/header.html';
include 'php/usr_favorites.php';
include 'html/footer.html';
?>

