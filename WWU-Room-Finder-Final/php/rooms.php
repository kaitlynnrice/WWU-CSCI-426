<div class="container-fluid">
  <div class="px-sm-5 py-1 border-bottom">
    <div class="row g-3 py-5 d-flex justify-content-center">
      <div class="col-auto">
        <div class="row  pb-3 border-bottom">
          <div class="col-auto">
            <h2>Available Rooms</h2>
          </div>
          <div class="col-auto">
            <!-- Button trigger modal -->
            <button type="button" class="d-inline d-lg-none btn btn-light text-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop-map">
              View Map
            </button>
            <?php require 'html/map_modal.html' ?>
          </div>
        </div>

        <!-- Rooms -->
        <?php foreach($avail_rms2 as $rm) { ?>
          <div class="row mt-3 border-bottom">
            <div class="col-auto my-4">

              <!-- room info -->
              <div class="row g-3">
                <div class="col-auto">
                  <!-- <form action="room.php" method="GET" class="rm-btn">
                    <button type="submit" class="btn btn-primary btn-lg"><?php echo $rm->roomID ?></button>
                  </form> -->
                  <a href="room.php?roomID=<?php echo $rm->roomID ?>" class='rm-btn'>
                    <button type="submit" class="btn btn-primary btn-lg"><?php echo $rm->roomID ?></button>
                  </a>
                </div>

                <!-- favorite heart icon -->
                <div class="col-auto">
                  <?php if($rm->isFav) {?>
                    <div>
                      <button name="removeFav" class="favIcon" style="border: none; padding: 0; background: none;" value="<?= $rm->roomID ?>">
                        <div id="<?= $rm->roomID ?>">
                          <svg name="' + name + '" class="bi d-block mx-auto mb-1" width="48" height="48"><use xlink:href="#favorite"/></svg>
                        </div>
                      </button>
                    </div>
                  <?php } else { ?>
                    <div>
                    <button name="addFav" class="noFavIcon" style="border: none; padding: 0; background: none;" value="<?= $rm->roomID ?>">
                        <div id="<?= $rm->roomID ?>">
                          <!-- empty heart -->
                          <svg name="<?= $rm->roomID ?>" class="bi d-block mx-auto mb-1" width="48" height="48"><use xlink:href="#favorite-border"/></svg> 
                        </div>
                      </button>
                    </div>
                  <?php } ?>
                </div>
                <div class="col ms-6 ps-5 float-end">
                  <!-- <svg class="bi d-block mx-auto mb-1" width="48" height="48"><use xlink:href="#pin"/></svg> -->
                </div>
              </div>
              
              <!-- Reserve -->
              <div class="row mt-3 align-items-center align-middle">
                <div class="col-auto">
                  <p>Next Reservation: <strong><?php echo $rm->nextReservation ?></strong></p>
                </div>
                <div class="col-auto">
                  <svg class="bi d-block mx-auto mb-1" width="48" height="48"><use xlink:href="#arrow"/></svg>
                </div>
                <div class="col-auto">
                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                  Reserve
                  </button>
                  <?php require 'reservation_modal.php' ?>
                </div>
              </div>
              <!-- filters -->
              <div class="row my-3">
                <div class="tagWrapper">
                  <div class="tagGroup">
                    <?php foreach($rm->features as $tag) { ?>
                    <!-- loop through: room tags -->
                      <span style="  font-size: 1em; padding: 0 15px 0 15px; text-align: center; border-radius: 25px; background: #EAEDEF; color: #007AC8; padding: 0 10px 0 10px; margin: 4px;">
                      <?php echo $tag ?></span>
                    <?php } ?>
                  </div>
                </div>
              </div>
            </div>
          </div>  
        <?php } ?>
      </div>
      <?php include 'html/map.html' ?>
    </div>
  </div>
</div>


