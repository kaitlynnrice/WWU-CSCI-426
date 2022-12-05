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
        <div class="row border-bottom">
          <h2>Your Reservations</h2>
        </div>

        <!-- Rooms -->
        <?php foreach($all_reservations as $res) { ?>
          <div class="row border-bottom">
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
                            <svg name="<?= $res->roomID ?>" xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                              <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
                            </svg>
                          </div>
                        </button>`
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
              <div class="row">
                <div class="col-auto">
                  <p>Date: <strong><?php echo $res->date ?></strong></p>
                  <p>Start Time: <strong><?php echo date("g:ia", strtotime($res->startTime)) ?></strong></p>
                  <p>End Time: <strong><?php echo date("g:ia", strtotime($res->startTime)) ?></strong></p>
                </div>
                <div class="col-auto">
                  <svg class="bi d-block mx-auto mb-1" width="48" height="48"><use xlink:href="#arrow"/></svg>
                </div>
                <div class="col-auto">
                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                  Cancel Now
                  </button>
                  <?php require 'cancel_modal.php' ?>
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


    $('svg[name="'+ name + '"]').replaceWith('<svg name="'+ name + '" xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">' +
                          '<path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>' +
                        '</svg>');
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


  $(document).on('click', 'button[name="delete"]', function (e) {
    var name = $(this).attr("value");
    $_SESSION['reservations'] = array_remove_object($_SESSION['reservations'], $name, 'roomID');
    return;
  });
      
</script>
