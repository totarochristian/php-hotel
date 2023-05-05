<!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP Hotel</title>
  <!-- Import my custom files -->
  <link rel="stylesheet" href="./styles/general.css">
  <!-- Import bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  <!-- Include fontawesome library -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
  <?php
    $hotels = [
        [
            'name' => 'Hotel Belvedere',
            'description' => 'Hotel Belvedere Descrizione',
            'parking' => true,
            'vote' => 4,
            'distance_to_center' => 10.4,
            'image' => 'hotel-belvedere.jpg'
        ],
        [
            'name' => 'Hotel Futuro',
            'description' => 'Hotel Futuro Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 2,
            'image' => 'hotel-futuro.jpeg'
        ],
        [
            'name' => 'Hotel Rivamare',
            'description' => 'Hotel Rivamare Descrizione',
            'parking' => false,
            'vote' => 1,
            'distance_to_center' => 1,
            'image' => 'hotel-rivamare.jpg'
        ],
        [
            'name' => 'Hotel Bellavista',
            'description' => 'Hotel Bellavista Descrizione',
            'parking' => false,
            'vote' => 5,
            'distance_to_center' => 5.5,
            'image' => 'hotel-bellavista.jpg'
        ],
        [
            'name' => 'Hotel Milano',
            'description' => 'Hotel Milano Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 50,
            'image' => 'hotel-milano.jpg'
        ]
    ];

    $filterParking = isset($_GET['parking']) ? $_GET['parking'] : -1;
    $filterVote = isset($_GET['vote']) ? $_GET['vote'] : 0;
  ?>

  <form action="<?php echo $_SERVER['PHP_SELF']?>" method="GET">
    <!-- Parking filter -->
    <label for="parking">Parcheggio: </label>
    <select name="parking" id="parking">
      <option value="-1" <?php if($filterParking == -1) echo 'selected' ?>>Tutti i risultati</option>
      <option value="1" <?php if($filterParking == 1) echo 'selected' ?>>Incluso</option>
      <option value="0" <?php if($filterParking == 0) echo 'selected' ?>>Non incluso</option>
    </select>
    <!-- Vote filter -->
    <label for="vote">Voto: </label>
    <input type="number" name="vote" id="vote" max="5" min="0" value="<?php echo $filterVote ?>">
    <!-- Submit btn -->
    <input type="submit" value="Filtra dati">
  </form>
  <!-- Hotel cards container -->
  <div class="d-flex justify-content-center align-items-stretch gap-4">
    <?php foreach($hotels as $elem){?>
      <?php if(isset($filterParking) && ($filterParking<0 || $filterParking==$elem["parking"])){ ?>
        <div class="card" style="width: 18rem;">
          <img src="./assets/images/<?php echo $elem['image'] ?>" class="card-img-top" alt="...">
          <div class="card-body">
            <p class="card-text">
              <?php for($i=0; $i<$elem["vote"]; $i++){?>
                <i class="fa-solid fa-star"></i>
              <?php } ?>
            </p>
            <h5 class="card-title"><?php echo $elem["name"] ?></h5>
            <p class="card-text"><?php echo $elem["description"] ?></p>
            <p class="card-text badge rounded-pill text-bg-primary"><?php echo $elem["distance_to_center"] ?> km dal centro</p>
            <?php if($elem["parking"]){ ?>
              <p class="card-text badge rounded-pill text-bg-primary">parcheggio</p>
            <?php } ?>
          </div>
        </div>
      <?php } ?>
    <?php } ?>
  </div>
</body>
</html>