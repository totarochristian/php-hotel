<?php
  $filterName = isset($_GET['name']) ? $_GET['name'] : "";
  $filterParking = isset($_GET['parking']) ? $_GET['parking'] : -1;
  $filterVote = isset($_GET['vote']) && !empty($_GET['vote']) ? $_GET['vote'] : 1;