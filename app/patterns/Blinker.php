<?php

class Blinker implements PatternsInterface {

  public $matrix;
  public $direction;

  public function create(){
      $this->direction = "horizontal"; // default
      $this->matrix = [
          [0,0,0,0,0],
          [0,0,1,0,0],
          [0,0,1,0,0],
          [0,0,1,0,0],
          [0,0,0,0,0]
      ];
  }

  public function getPatternMatrix() {
    return $this->matrix;
  }

}

?>
