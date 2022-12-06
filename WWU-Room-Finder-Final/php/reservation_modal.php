<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Reserve</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <!-- <form action="reservations.php" method="post" id="reserve"> -->
      <form action="reservations.php" method="post" id="reserve" name="add_reservation">

        <div class="modal-body">
          <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">Name</label>
            <input name="name" type="text" class="form-control" id="formGroupExampleInput" placeholder="John Smith" required>
          </div>
          <div class="mb-3">
            <label for="rm-num" class="form-label">Room Number</label> <br>
            <select name="roomID">
                <?php foreach($_SESSION['rooms3'] as $res) { ?>
                  <option>
                      <?php echo $res->roomID ?>
                  </option>
                <?php } ?>
            </select>
          </div>
          <div class="mb-3">
            <label for="res-date" class="form-label">Date</label>
            <input name="date" type="date" class="form-control" id="res-date" required>
          </div>
          <div class="mb-3">
            <label for="start" class="form-label">Start Time</label>
            <input name="startTime" type="time" class="form-control" id="start" required>
          </div>
          <div class="mb-3">
            <label for="end" class="form-label">End Time</label>
            <input name="endTime" type="time" class="form-control" id="end" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary">Reserve Now</button>
        </div>
      </form>
    </div>
  </div>
</div>


