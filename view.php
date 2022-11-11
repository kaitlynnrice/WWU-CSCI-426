<?php 
require('validate.php');

$room_type = array("Computer Lab", "Classroom");
$buildings = array("Communication Facilities (CF)");
$rooms = array("CF 105", "CF 110");
$filters = array("Windows", "Whiteboards", "Group work tables", "Mac OS Computers", "Windows Computers", "Projectors");
$view_modes = array("Month", "Week", "Day", "Hourly");
$mode = $view_modes[0];

$avail_rms = array("CF 105"=>"Today at 3:00pm", "CF 110"=>"Tomorrow at 2:00pm");

if ($_SERVER["REQUEST_METHOD"] == "GET") {
  # variables
  $building = $_GET["building"] ?? "";
  $type = $_GET["type"] ?? "";
  $name = $_GET["name"] ?? "";
  $date = $_GET["date"] ?: date("F/j/Y");
  $date = date("F/j/Y", strtotime($date));
  $start = $_GET["start"] ?: date("g:i");
  $end = $_GET["end"] ?: date("g:i", strtotime('+1 hour'));
  $capacity = $_GET["capactiy"] ?: "35";

  $filters = $_GET["filters"] ?? ""; 
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Room Finder - View</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
      <div class="wrapper">
      <header>
          <span id="logo" class="left">
            <a href="search.php"><img src="images/logo.png" alt="Western Washington University logo"></a>
          </span>
          <span id="heading" class="left">
            Western Room Finder
          </span>
          <nav class="right">
            <a href="Favorites.html"><img src="images/heart.png" alt="favorites"></a>
            <a href="Reservation.html"><img src="images/calender.png" alt="reservations"></a>
            <a href="search.php"><img src="images/Search.png" alt="search"></a>
          </nav>
        </header>

        <!-- Make into form -->

        <div id="choices">
          <span id="name" class="left">
            <p><?php echo $name ?> <img src="images/heart2.png" alt="favorites icon"></p>
            
          </span>
          <span id="date" class="left">
            <p><?php echo $date?></p>
          </span>
          <span id="reserve_room" class="left">
            <form action="reserve.php" method="POST" id="room_reservation">
              <button id="reserve_btn">Reserve</button>
            </form>
          </span>
          <span id="user_filters" class="right">
            <p><?php echo $capacity ?></p>
          </span>
        </div>
        
        <div id="availabliltiy">
          <div class="left" id="avail-rms">
            <h2>Available Rooms</h2>
            <?php 
           foreach($avail_rms as $rm => $avail) {
              echo "<hr>";
              echo "<div class='rm'>";
              echo "<h3>" . $rm . "</h3>";
              echo "<p> Next availability on <b>" . $avail . "</b></p>";
              echo "</div>";
            } ?>
          </div>
          <div class="right" id="map">
            <img alt="WWU Campus Map" src="images/campus_map.png" id="campus-map">
          </div>
        </div>
      </div>
    </body>
</html>