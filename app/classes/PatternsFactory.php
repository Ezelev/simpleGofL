<?php

class PatternsFactory {

  private $availablePatterns;

  public function __construct(){
     getAvailabelPatterns();
  }

  private function getAvailabelPatterns(){
    foreach(glob('../patterns/*.php') as $patternName){
       $availablePatterns[] = $patternName;
    }
  }

  public function createPattern($patternName){

    if(isset($availablePatterns[$patternName])){}
        return new $patternName();
    }

}

?>
