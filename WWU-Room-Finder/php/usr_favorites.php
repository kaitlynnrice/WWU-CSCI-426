<?php 
#require 'reserve.php';

#$avail_rms = array("CF 105"=>"Today at 3:00pm", "CF 110"=>"Tomorrow at 2:00pm", "OM 200"=>"Today at 1:00pm");
$avail_rms = array("WWU 123"=>"Today at 3:00pm", "WWU 234"=>"Today at 3:00pm");
$tags =array("Capacity", "Whiteboard", "Computers", "Projectors");

?>

<div class="container-fluid">
  <div class="px-sm-5 py-1 border-bottom">
    <div class="row g-3 py-5 d-flex justify-content-center">
      <div class="col-auto">
        <div class="row border-bottom">
          <h2>Your Favorites</h2>
        </div>

        <!-- Rooms -->
        <?php foreach($avail_rms as $rm => $avail) { ?>
          <div class="row border-bottom">
            <div class="col-auto my-4">

              <!-- room info -->
              <div class="row g-3">
                <div class="col-auto">
                  <form action="room.php" method="GET" class="rm-btn">
                    <button type="submit" class="btn btn-primary btn-lg"><?php echo $rm ?></button>
                  </form>
                </div>
                <div class="col-auto">
                  <svg class="bi d-block mx-auto mb-1" width="48" height="48"><use xlink:href="#favorite-border"/></svg>
                </div>
                <div class="col ms-6 ps-5 float-end">
                  <!-- <svg class="bi d-block mx-auto mb-1" width="48" height="48"><use xlink:href="#pin"/></svg> -->
                </div>
              </div>
              
              <!-- Reserve -->
              <div class="row">
                <div class="col-auto">
                  <p>Next Reservation: <strong><?php echo $avail ?></strong></p>
                </div>
                <div class="col-auto">
                  <svg class="bi d-block mx-auto mb-1" width="48" height="48"><use xlink:href="#arrow"/></svg>
                </div>
                <div class="col-auto">
                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                  Reserve Now
                  </button>
                  <?php require './html/reservation_modal.html' ?>
                </div>
              </div>
              <!-- filters -->
              <div class="row">
                <div class="tagWrapper">
                  <div class="tagGroup">
                    <?php foreach($tags as $tag) { ?>
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
      <div class="col-auto">
        <!--Google map-->
        <div id="map" class="px-4">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7340.55075425019!2d-122.48847349390674!3d48.73404395784468!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x5485a3ca4cc915cd%3A0xa84926de4cbaf2c0!2sWestern%20Washington%20University!5e0!3m2!1sen!2sus!4v1669231430691!5m2!1sen!2sus" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
      </div>
    </div>
  </div>
</div>