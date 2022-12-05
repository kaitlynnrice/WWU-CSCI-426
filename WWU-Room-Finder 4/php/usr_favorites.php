<?php 

if( isset($_POST['room']) ){

  //  get room num
  $key = $_POST['room'];

  //remove from favs array
  $_SESSION['favs']=array_remove_object($_SESSION['favs'], $key, 'roomID');

  // remove heart fill
  $_SESSION['rooms3'][$key]->isFav = false;

  echo "<meta http-equiv='refresh' content='0'>";
}

?>

<div class="container-fluid">
  <div class="px-sm-5 py-1 border-bottom">
    <div class="row g-3 py-5 d-flex justify-content-center">
      <div class="col-auto">
        <div class="row border-bottom">
          <h2>Your Favorites</h2>
        </div>

        <div id="roomInfo">
        <!-- Rooms -->
          <?php foreach($avail_rms as $rm) { ?>
            <div class="row border-bottom">
              <div class="col-auto my-4">

                <!-- room info -->
                <div class="row g-3">
                  <div class="col-auto">
                    <a href="room.php?roomID=<?php echo $rm->roomID ?>" class='rm-btn'>
                      <button type="submit" class="btn btn-primary btn-lg"><?php echo $rm->roomID ?></button>
                    </a>
                  </div>
                  <div class="col-auto">
                    <div>
                        <button name="removeFav" class="favIcon" style="border: none; padding: 0; background: none;" value="<?= $rm->roomID ?>">
                          <div id="<?= $rm->roomID ?>">
                            <svg name="<?= $rm->roomID ?>" xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                              <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
                            </svg>
                          </div>
                        </button>`
                      </div>
                  </div>
                  <div class="col ms-6 ps-5 float-end">
                    <!-- <svg class="bi d-block mx-auto mb-1" width="48" height="48"><use xlink:href="#pin"/></svg> -->
                  </div>
                </div>
                
                <!-- Reserve -->
                <div class="row">
                  <div class="col-auto">
                    <p>Next Reservation: <strong><?php echo $rm->nextReservation ?></strong></p>
                  </div>
                  <div class="col-auto">
                    <svg class="bi d-block mx-auto mb-1" width="48" height="48"><use xlink:href="#arrow"/></svg>
                  </div>
                  <div class="col-auto">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    Reserve Now
                    </button>
                    <?php require 'reservation_modal.php' ?>
                  </div>
                </div>
                <!-- filters -->
                <div class="row">
                  <div class="tagWrapper">
                    <div class="tagGroup">
                      <?php foreach($rm->features as $tag) { ?>
                      <!-- loop through: room tags -->
                        <span class="tag"><?php echo $tag ?></span>
                      <?php } ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>  
          <?php } ?>
        </div>
      </div>
      <div class="col-auto">
        <!--Google map-->
        <div id="map" class="px-4">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7340.55075425019!2d-122.48847349390674!3d48.73404395784468!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x5485a3ca4cc915cd%3A0xa84926de4cbaf2c0!2sWestern%20Washington%20University!5e0!3m2!1sen!2sus!4v1669231430691!5m2!1sen!2sus" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
      </div>
    </div>
  </div>
</div>



<script language="JavaScript" type="text/javascript" src="/js/jquery-1.2.6.min.js"></script>
<script language="JavaScript" type="text/javascript" src="/js/jquery-ui-personalized-1.5.2.packed.js"></script>
<script language="JavaScript" type="text/javascript" src="/js/sprinkle.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).on('click', 'button[name="removeFav"]', function (e) {

      e.preventDefault();

      var name = $(this).attr("value");

      $.ajax({
        type: 'post',
        data: {'room': name},
      });

      // reloads room - deletes room from list
      $("#roomInfo").load(location.href + " #roomInfo");
    });
</script>