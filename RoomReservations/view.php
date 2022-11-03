<?php 
require('validate.php');

$room_type = array("Computer Lab", "Classroom");
$buildings = array("Communication Facilities (CF)");
$rooms = array("CF 105", "CF 110");
$filters = array("Windows", "Whiteboards", "Group work tables", "Mac OS Computers", "Windows Computers", "Projectors");
$view_modes = array("Month", "Week", "Day", "Hourly");
$mode = $view_modes[0];

if ($_SERVER["REQUEST_METHOD"] == "GET") {
  # variables
  $building = $_GET["building"] ?? "";
  $type = $_GET["type"] ?? "";
  $name = $_GET["name"] ?? "";
  $date = $_GET["date"] ?: date("F/j/Y");
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
            <img src="images/logo.png" alt="Western Washington University logo">
          </span>
          <span id="heading" class="left">
            Western Room Finder
          </span>
          <nav class="right">
            <a href="favorites.php"><img src="images/heart.png" alt="favorites"></a>
            <a href="reservations.php"><img src="images/calender.png" alt="reservations"></a>
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
          <span id="view" class="left">
            <select name="view">
              <?php foreach ($view_modes as $mode) {?>
                <option value="<?php echo $mode ?>"><?php echo $mode ?></option>
              <?php }?>
            </select>
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

        <!-- dynamic area
      
                Search results [no specific classroom chosen] -

                OR

                go directly to view_calendar
        -->

        <div id="calendar">

        </div>
      </div>
    </body>
</html>