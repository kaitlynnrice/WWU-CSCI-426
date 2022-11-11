<?php 
# NOTE: using GET method in form to store non sensitive data in the URL to enable sharing among colleagues


# change arrays to retrieving from database
$room_type = array("Computer Lab", "Classroom");
$buildings = array("Communication Facilities (CF)");
$rooms = array("CF 105", "CF 110");
$filters = array("Windows", "Whiteboards", "Group work tables", "Mac OS Computers", "Windows Computers", "Projectors");
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Room Finder - Search</title>
        <link rel="stylesheet" href="styles.css">
        <meta charset="UTF-8">
        <meta name="description" content="Western Washington University Room Finder">
        <meta name="keywords" content="HTML, PHP, SQL, WWU, Western Washington University">
        <meta name="author" content="Isak Ogurkow, Isabel Rodriguez, Kaitlyn Rice , Natalie Haass">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

    <body>
      <div class="wrapper">
      <header>
          <span id="logo" class="left">
            <a href="search.php" alt="search"><img src="images/logo.png" alt="Western Washington University logo"></a>
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
        <form action="view.php" method="GET" id="search">
          <fieldset class="left">
            <legend>
              Room Search
              <img src="images/Search-2.png" alt="search icon">
            </legend>
            <div class="search_options">
              <label>Building</label>
              <br>
                
              <select name="building">
                <?php foreach ($buildings as $build) {?>                        
                  <option value="<?php echo $build ?>"><?php echo $build ?></option>
                <?php }?>
              </select>
            </div>
            

            <div class="search_options">
              <label>Room Type</label>
              <br>
              <select name="type">
                <?php foreach ($room_type as $type) {?>
                  <option value="<?php echo $type ?>"><?php echo $type ?></option>
                <?php }?>
              </select>
            </div>

            <div class="search_options">
              <label>Room Name</label>
              <br>
              <select name="name">
                <?php foreach ($rooms as $rm) {?>
                  <option value="<?php echo $rm ?>"><?php echo $rm ?></option>
                <?php }?>
              </select>
            </div>

            <div class="search_options">
              <label>Date*</label>
              <br>
              <input type="date" name="date" required>
            </div>

            <div class="search_options">
              <label>Time</label>
              <br>
              <label for="start" id="start">Start: </label>
              <input type="time" name="start" value="<?php echo date("g:i") ?>">
              <label for="end" id="end">End: </label>
              <input type="time" name="end" value="<?php echo date("g:i") ?>">
            </div>

            <div class="search_options">
              <label>Room Capacity</label>
              <br>
              <input type="number" name="capactiy" placeholder="35">
            </div>
              
          </fieldset>
          
          <fieldset class="right" id="filter_rooms">
            <legend>
              Filter Rooms
              <span><img src="images/filter.png" alt="filter icon"></span>
            </legend>
            <?php foreach ($filters as $item) {?>
               <p class="filters" >
                <input type="checkbox" name="<?php echo $item ?>" value="false">
                  <?php echo $item ?>
            <?php }?>
          </fieldset>
          <input type="submit" name="search" value="Search">
        </form>
      </div>
    </body>
</html>