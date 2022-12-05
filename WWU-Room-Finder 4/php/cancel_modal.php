<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Cancel Reservation</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="reservations.php" method="post" id="reserve">
        <div class="modal-body">
          <p>Are you sure you want to cancel?</p>
        </div>
        <div class="modal-footer">
          <input name="cancelRes" type="hidden" value="<?= $res->roomID ?>">
          <button name = "delete" value="<?= $res->roomID ?>" type="submit" class="btn btn-outline-danger" data-bs-dismiss="modal">Confirm</button>
        </div>
      </form>
    </div>
  </div>
</div>