<!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP Hotel</title>
  <link rel="shortcut icon" href="./assets/images/icon.png" type="image/x-icon">
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
            'description' => 'Il 4 stelle Hotel Belvedere Riccione offre momenti di relax nell\'area spa per adulti & tanti servizi per bambini & famiglie',
            'parking' => true,
            'vote' => 4,
            'distance_to_center' => 10.4,
            'image' => 'hotel-belvedere.jpg'
        ],
        [
            'name' => 'Hotel Futuro',
            'description' => 'L\'Hotel Futuro si trova nel centro di Aversa, a 5 minuti d\'auto dalla stazione, è facilmente raggiungibile dall\'autostrada A1 e propone camere climatizzate',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 2,
            'image' => 'hotel-futuro.jpeg'
        ],
        [
            'name' => 'Hotel Rivamare',
            'description' => 'Goditi il sole e le spiagge del Lido di Venezia con l\'ospitalità di Hotel Rivamare. Prenota Hotel 3 stelle al Lido di Venezia, a 20 minuti da Venezia',
            'parking' => false,
            'vote' => 1,
            'distance_to_center' => 1,
            'image' => 'hotel-rivamare.jpg'
        ],
        [
            'name' => 'Hotel Bellavista',
            'description' => 'Hotel Bellavista si trova a Pinzolo a 800 metri dagli impianti di risalita. Bellavista è un family hotel con ricchi programmi di animazione per i bambini',
            'parking' => false,
            'vote' => 5,
            'distance_to_center' => 5.5,
            'image' => 'hotel-bellavista.jpg'
        ],
        [
            'name' => 'Hotel Milano',
            'description' => 'Ospitalità di Montagna in Val Seriana nel nostro Hotel con SPA, Centro Benessere e Ristorante per gustare le nostre delizie a tutte le ore del giorno',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 50,
            'image' => 'hotel-milano.jpg'
        ]
    ];

    $filterName = isset($_GET['name']) ? $_GET['name'] : "";
    $filterParking = isset($_GET['parking']) ? $_GET['parking'] : -1;
    $filterVote = isset($_GET['vote']) && !empty($_GET['vote']) ? $_GET['vote'] : 1;
  ?>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#" class="d-flex align-items-center">
        <img src="./assets/images/icon.png" alt="Bootstrap" width="55" height="60">
        <span>Hotels</span>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Form with the filters -->
        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="GET" class="w-100 p-3 d-flex justify-content-center align-items-center gap-4 flex-wrap">
          <!-- Name filter -->
          <div class="d-flex gap-2 align-items-center">
            <label for="vote">Nome: </label>
            <input type="text" name="name" id="name" maxlength="20" value="<?php echo $filterName ?>">
          </div>
          <!-- Parking filter -->
          <div class="d-flex gap-2 align-items-center">
            <label for="parking">Parcheggio: </label>
            <select name="parking" id="parking">
              <option value="-1" <?php if($filterParking == -1) echo 'selected' ?>>Tutti i risultati</option>
              <option value="1" <?php if($filterParking == 1) echo 'selected' ?>>Incluso</option>
              <option value="0" <?php if($filterParking == 0) echo 'selected' ?>>Non incluso</option>
            </select>
          </div>
          <!-- Vote filter -->
          <div class="d-flex gap-2 align-items-center">
            <label for="vote">Voto minimo: </label>
            <input type="number" name="vote" id="vote" max="5" min="1" value="<?php echo $filterVote ?>">
          </div>
          <!-- Submit btn -->
          <input type="submit" value="Cerca">
        </form>
      </div>
    </div>
  </nav>

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
</body>
</html>