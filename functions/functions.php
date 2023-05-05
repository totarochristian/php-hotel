<?php
  include __DIR__ . '/../data/hotelData.php';
  include __DIR__ . '/../data/filterData.php';

  /**
   * Function that will check an element passed and returns true if the element could be showed (by the filters values), false otherwise
   * @param mixed $elem Element to check
   * @param mixed $filterParking Parking value defined in the filter form
   * @param mixed $filterVote Vote value defined in the filter form
   * @param mixed $filterName Name value defined in the filter form
   * @return mixed True if the element had to be showed, false otherwise
   */
  function ShowElement($elem, $filterParking, $filterVote, $filterName){
    return (isset($filterParking) && ($filterParking<0 || $filterParking==$elem["parking"]))&&($filterVote==0 || $filterVote<=$elem['vote'])&&(str_contains(strtolower($elem['name']),strtolower($filterName)));
  }
