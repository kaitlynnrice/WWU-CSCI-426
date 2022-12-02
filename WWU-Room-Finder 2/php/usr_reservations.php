<?php 

if( isset($_POST['favs']) ){

  //add and new favorite rooms
  $_SESSION['favs'] = Array();
  foreach($_POST['favs'] as $key) {
    if (!array_key_exists($key, $_SESSION['favs'])) {
        $_SESSION['favs'] += Array($key => $_SESSION['rooms3'][$key]);
        $_SESSION['rooms3'][$key]->isFav = true;
      }
  }

  //remove any un-favorited rooms 
  foreach($_POST['removeFavs'] as $key) {
    $_SESSION['rooms3'][$key]->isFav = false;
  }

  exit;
}

?>

<div class="container-fluid">
  <div class="px-sm-5 py-1 border-bottom">
    <div class="row g-3 py-5 d-flex justify-content-center">
      <div class="col-auto">
        <div class="row  pb-3 border-bottom">
          <div class="col-auto">
            <h2>Your Reservations</h2>
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
        <?php foreach($all_reservations as $res) { ?>
          <div class="row mt-3 border-bottom">
            <div class="col-auto my-4">

              <!-- room info -->
              <div class="row g-3">
                <div class="col-auto">
                  <a href="room.php?roomID=<?php echo $res->roomID ?>" class='rm-btn'>
                    <button type="submit" class="btn btn-primary btn-lg"><?php echo $res->roomID ?></button>
                  </a>
                </div>
                <div class="col-auto">
                <?php if($avail_rooms[$res->roomID]->isFav) {?>
                    <div>
                      <button name="removeFav" class="favIcon" style="border: none; padding: 0; background: none;" value="<?= $res->roomID ?>">
                        <div id="<?= $res->roomID ?>">
                          <svg name="' + name + '" class="bi d-block mx-auto mb-1" width="48" height="48"><use xlink:href="#favorite"/></svg>
                        </div>
                      </button>
                    </div>
                  <?php } else { ?>
                    <div>
                    <button name="addFav" class="noFavIcon" style="border: none; padding: 0; background: none;" value="<?= $res->roomID ?>">
                        <div id="<?= $res->roomID ?>">
                          <!-- empty heart -->
                          <svg name="<?= $res->roomID ?>" class="bi d-block mx-auto mb-1" width="48" height="48"><use xlink:href="#favorite-border"/></svg> 
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
              <div class="row mt-3">
                <div class="col-auto">
                  <p>Date: <strong><?php echo $res->date ?></strong></p>
                  <p>Start Time: <strong><?php echo $res->startTime ?></strong></p>
                  <p>End Time: <strong><?php echo $res ->endTime ?></strong></p>
                </div>
                <div class="col-auto">
                  <svg class="bi d-block mx-auto mb-1" width="48" height="48"><use xlink:href="#arrow"/></svg>
                </div>
                <div class="col-auto">
                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                  Cancel Now
                  </button>
                  <?php require './html/cancel_modal.html' ?>
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

<script language="JavaScript" type="text/javascript" src="/js/jquery-1.2.6.min.js"></script>
<script language="JavaScript" type="text/javascript" src="/js/jquery-ui-personalized-1.5.2.packed.js"></script>
<script language="JavaScript" type="text/javascript" src="/js/sprinkle.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>

  var favs = Object.keys(<?php echo json_encode($_SESSION['favs']); ?>);
  var removeFavs = new Array();

  // call to php
  function updateSessionFavs(){
    $.ajax({
      type: 'post',
      data: {'favs': favs, 'removeFavs': removeFavs},
    });
  }
  

  // adds any new favorites to _SESSION right before user leaves page
  window.addEventListener("beforeunload", function (e) {
    setTimeout(updateSessionFavs(), 100000);
    return;
  });


  // adds favorite
  $(document).on('click', 'button[name="addFav"]', function (e) {
    e.preventDefault();

    // get specific room id 
    var name = $(this).attr("value");

    // update local fav/un-fav arrays
    favs.push(name);
    removefavs = removeFavs.filter(function(e) { return e !== name });

    // switch to filled heart    
    $(this).prop('name', 'removeFav');
    $(this).prop('class', 'favIcon');


    $('svg[name="'+ name + '"]').replaceWith('<svg name="' + name + '" class="bi d-block mx-auto mb-1" width="48" height="48"><use xlink:href="#favorite"/></svg>');
    return;
  });

  // removes favorite
  $(document).on('click', 'button[name="removeFav"]', function (e) {
    e.preventDefault();

    var name = $(this).attr("value");

    favs = favs.filter(function(e) { return e !== name });
    removeFavs.push(name);

    $(this).prop('name', 'addFav');
    $(this).prop('class', 'noFavIcon');

    $('svg[name="'+ name + '"]').replaceWith('<svg name="' + name + '" class="bi d-block mx-auto mb-1" width="48" height="48"><use xlink:href="#favorite-border"/></svg>');
    return;
  });
      
</script>
