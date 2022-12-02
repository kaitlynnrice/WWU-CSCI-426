<div class="container-fluid">
  <div class="row col-md-10 offset-md-1 d-flex align-items-center" style="margin-top: 20px">
    <div class="col-2 text-end">
        <h2 style="font-size: 50px"><?php echo $roomID ?></h2>
    </div>
    
    <div class="col-1">

        <?php if($isFav) {?>
            <div>
                <button name="removeFav" class="favIcon" style="border: none; padding: 0; background: none;" value="<?= $roomID ?>">
                <div id="<?= $roomID ?>">
                    <svg name="<?= $roomID ?>" xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
                    </svg>
                </div>
                </button>`
            </div>
            <?php } else { ?>
            <div>
            <button name="addFav" class="noFavIcon" style="border: none; padding: 0; background: none;" value="<?= $roomID ?>">
                <div id="<?= $roomID ?>">
                    <!-- empty heart -->
                    <svg name="<?= $roomID ?>" class="bi d-block mx-auto mb-1" width="48" height="48" style="margin-top: 20px"><use xlink:href="#favorite-border"/></svg> 
                </div>
                </button>
            </div>
        <?php } ?>


      <!-- <svg class="bi d-block mx-auto mb-1" width="48" height="48" style="margin-top: 20px"><use xlink:href="#favorite-border"/></svg>  -->


    </div>
    <div class="col-4">
        <?php foreach($tags as $tag) { ?>
            <!-- loop through: room tags -->
            <span class="tag"
                style="  font-size: 1em; padding: 0 15px 0 15px; text-align: center; border-radius: 25px; background: #EAEDEF; color: #007AC8; padding: 0 10px 0 10px; margin: 4px;">
                <?php echo $tag ?>
            </span>
        <?php } ?>
    </div>
    <div class="col-3 offset-md-2">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            Reserve Now
        </button>
        <?php require './html/reservation_modal.html' ?>
    </div>
  </div>
</div>
