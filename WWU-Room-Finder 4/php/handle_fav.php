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



<script language="JavaScript" type="text/javascript" src="/js/jquery-1.2.6.min.js"></script>
<script language="JavaScript" type="text/javascript" src="/js/jquery-ui-personalized-1.5.2.packed.js"></script>
<script language="JavaScript" type="text/javascript" src="/js/sprinkle.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>

  var favs = Object.keys(<?php echo json_encode($_SESSION['favs']); ?>);
  var removeFavs = new Array();

  // call to php - prevents enture page reload
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

    $('svg[name="'+ name + '"]').replaceWith('<svg name="' + name + '" class="bi d-block mx-auto mb-1" width="48" height="48" style="margin-top: 20px"><use xlink:href="#favorite-border"/></svg>');
    return;
  });
      
</script>