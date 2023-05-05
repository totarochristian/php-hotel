<?php include './hotelData.php' ?>

<!-- Hotel cards container -->
<div id="hotelsContainer" class="p-4 mt-4 mb-4 d-flex justify-content-center align-items-stretch gap-4 flex-wrap">
  <?php
    $counter = 0;
    foreach($hotels as $elem){?>
    <?php 
      if((isset($filterParking) && ($filterParking<0 || $filterParking==$elem["parking"]))&&($filterVote==0 || $filterVote<=$elem['vote'])&&(str_contains(strtolower($elem['name']),strtolower($filterName)))){ 
        $counter += 1;
      ?>
      <div class="card" style="width: 18rem;">
        <img src="./assets/images/<?php echo $elem['image'] ?>" class="card-img-top" alt="...">
        <div class="card-body">
          <!-- Vote defined printing stars -->
          <p id="stars" class="card-text">
            <?php for($i=0; $i<$elem["vote"]; $i++){?>
              <i class="fa-solid fa-star"></i>
            <?php } ?>
          </p>
          <!-- Title and description of the hotel -->
          <h5 class="card-title"><?php echo $elem["name"] ?></h5>
          <p class="card-text"><?php echo $elem["description"] ?></p>
          <!-- Badges in the bottom of the card -->
          <p class="card-text badge rounded-pill text-bg-primary"><?php echo $elem["distance_to_center"] ?> km dal centro</p>
          <?php if($elem["parking"]){ ?>
            <p class="card-text badge rounded-pill text-bg-primary">parcheggio incluso</p>
          <?php } ?>
        </div>
      </div>
    <?php } ?>
  <?php } 
    if($counter == 0)
      echo '<h2>Non ci sono risultati per la tua ricerca!</h2>';
  ?>
</div>