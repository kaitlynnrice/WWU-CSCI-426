<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Room Finder - Reserve</title>
        <link rel="stylesheet" href="styles.css">
        <meta charset="UTF-8">
        <meta name="description" content="Western Washington University Room Finder">
        <meta name="keywords" content="HTML, PHP, SQL, WWU, Western Washington University">
        <meta name="author" content="Isak Ogurkow, Isabel Rodriguez, Kaitlyn Rice , Natalie Haass">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

<body>
    <div id="reservation">
      <form action="reservation.html" method="post" id="reserve">
      <h1>Reserve Room</h1>
        <fieldset>
          <div class="reservation_name">
            <label for="user_name">Reservation Holder</label>
            <br>
            <input type="text" name="user_name" placeholder="user_name">
          </div>
          <div class="reservation_room">
            <label for="room_id">Room ID</label>
            <br>
            <input type="text" name="room_ID" placeholder="room_ID">
          </div>
          <div class="reservation_date">
            <label for="date">Date</label>
            <br>
            <input type="date" name="date" value="date">
          </div>
          <div class="reservation_start">
            <label for="start">Start Time</label>
            <br>
            <input type="time" name="start" value="start">
          </div>
          <div class="reservation_end">
            <label for="end">End Time</label>
            <br>
            <input type="time" name="end" value="end">
          </div>
          <div class="reservation_capacity">
            <label for="cap">Group Capacity</label>
            <br>
            <input type="number" name="cap" value="cap">
          </div>
        </fieldset>
        <input type="submit" name="register" value="Confirm">
      </form>
    </div>
  </div>
</body>

</html>
