<?php
class Room {
  // Properties
  public $roomID;
  public $buildingID;
  public $capacity;
  public $features;
  public $nextReservation;
  public $isFav;

  public $reservations;

  // Methods
  function __construct($roomID, $buildingID, $capacity, $features, $nextReservation) {
    $this->roomID = $roomID;
    $this->buildingID = $buildingID;
    $this->capacity = $capacity;
    $this->features = $features;
    $this->nextReservation = $nextReservation;
    $isFav = false;
    $reservations = [];
  }

  function add_reservation ($reservation) {
    $reservations[] = $reservation;
  }

}

class Reservation {
    public $name;
    public $roomID;
    public $date;
    public $startTime;
    public $endTime;

    function __construct($name, $roomID, $date, $startTime, $endTime) {
        $this->name = $name;
        $this->roomID = $roomID;
        $this->date = $date;
        $this->startTime = $startTime;
        $this->endTime = $endTime;
    }
}

function array_remove_object(&$array, $value, $prop)
{
    return array_filter($array, function($a) use($value, $prop) {
        return $a->$prop !== $value;
    });
}


?>