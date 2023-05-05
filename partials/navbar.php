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