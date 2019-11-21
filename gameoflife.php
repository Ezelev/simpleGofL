<?php
// TODO create pattern/seed factory
class GameOfLife {

    /*
    * States variables
    */
    public $field;
    public $evolvingTable;
    public $evolveCount = 0;
    public $evolutionHistory = [];
    private $test;
    public $baseField;


    public function __construct( $test = false, $n, $m, $pattern = "", $initialSeed = []){

        //TODO размер basefield парсить из реквеста, а по умолчанию 10 на 10
        $this->baseField = $this->generateNxM($n, $m);
        // $this->field = $initialSeed;
        // $this->evolvingTable = $initialSeed;

        if($test) {
            // blinker
            switch($pattern) {

              case("blinker"):
              $initialSeed = [
                  [0,0,0,0,0],
                  [0,0,1,0,0],
                  [0,0,1,0,0],
                  [0,0,1,0,0],
                  [0,0,0,0,0]
                  ];
                  break;
              case("toad"):
              $initialSeed = [
                  [0,0,0,0,0,0],
                  [0,0,0,1,0,0],
                  [0,1,0,0,1,0],
                  [0,1,0,0,1,0],
                  [0,0,1,0,0,0],
                  [0,0,0,0,0,0]
                  ];
                  break;
              case("beacon"):
              $initialSeed = [
                [0,0,0,0,0,0],
                [0,1,1,0,0,0],
                [0,1,0,0,0,0],
                [0,0,0,0,1,0],
                [0,0,0,1,1,0],
                [0,0,0,0,0,0]
                ];
                  break;
                case("glider"):
                $initialSeed = [
                  [0,0,0,0,0],
                  [0,0,1,0,0],
                  [0,0,0,1,0],
                  [0,1,1,1,0],
                  [0,0,0,0,0]
                ];
                    break;
              default:
                  break;
            }

            $initialSeed = $this->mergePerKey($initialSeed, $this->baseField);
            $this->field = $initialSeed;
            $this->evolvingTable = $initialSeed;
        }

    }

    private function generateNxM($n, $m){
        $baseField = [];

        for($i = 0; $i < $n; $i++){
          for($j = 0; $j < $m; $j++){
            $baseField[$i][$j] = 0;
          }
        }
        return $baseField;
    }

    private function mergePerKey($array1,$array2)
    {
        $mergedArray = $array2;

        foreach ($array1 as $key => $value)
        {
            foreach ($value as $key2 => $value2)
            {
                $mergedArray[$key][$key2] = $value2;
            }

        }

        return $mergedArray;
    }

    public function printField() {
        echo "Start print: ";
        echo "<br>";
        for($i=0; $i<count($this->field); $i++){
            for($j=0; $j<count($this->field[0]); $j++){
                echo $this->field[$i][$j];
            }
            echo "<br>";
        }
    }

    public function printEvolveResult() {
        echo "Printing evolving result: ";
        echo "<br>";
        for($i=0; $i<count($this->evolvingTable); $i++){
            for($j=0; $j<count($this->evolvingTable[0]); $j++){
                echo $this->evolvingTable[$i][$j];
            }
            // echo "<br>";
        }
    }


    public function gameOfLife($cycles) {
        //$this->printField();
        // adding initial seed to history
        $this->evolutionHistory[0] = $this->field;
        for($i = 0; $i<= $cycles; $i++) {
            // echo "<br>";
            $this->evolve();
            // echo "Evolves number: " . $this->evolveCount;
            // echo "<br>";
            $this->evolutionHistory[$i+1] = $this->field;
            //$this->printEvolveResult();

        }
    }

    public function getEvolutionHistory() {
        return $this->evolutionHistory;
        // return json_encode($this->evolutionHistory);
    }

    public function evolve() {

        for($i=0; $i<count($this->field); $i++){
            for($j=0; $j<count($this->field[0]); $j++){

                $cellNeighbours = $this->getCellNeighbours($i,$j);

                if(count($cellNeighbours) < 2) {
                    $this->evolvingTable[$i][$j] = 0;
                }

                if(count($cellNeighbours) > 3) {
                    $this->evolvingTable[$i][$j] = 0;
                }

                if(count($cellNeighbours) == 2 && count($cellNeighbours) == 3) {
                    $this->evolvingTable[$i][$j] = 1;
                }

                if(count($cellNeighbours) == 3) {
                    $this->evolvingTable[$i][$j] = 1;
                }

                unset($cellNeighbours);
            }
        }
        $this->field = $this->evolvingTable;
        $this->evolveCount = $this->evolveCount + 1;
    }

    private function getCellNeighbours($i, $j){

        $cellNeighbours = [];
        //
        if(isset( $this->field[$i-1][$j-1]) && $this->field[$i-1][$j-1] == 1) {
            $cellNeighbours[] =  $this->field[$i-1][$j-1];
        }

        if(isset( $this->field[$i-1][$j]) && $this->field[$i-1][$j] == 1) {
            $cellNeighbours[] =  $this->field[$i-1][$j];
        }

        if(isset( $this->field[$i-1][$j+1]) && $this->field[$i-1][$j+1] == 1) {
            $cellNeighbours[] =  $this->field[$i-1][$j+1];
        }
        //
        if(isset( $this->field[$i][$j-1]) && $this->field[$i][$j-1] == 1) {
            $cellNeighbours[] =  $this->field[$i][$j-1];
        }

        if(isset( $this->field[$i][$j+1]) && $this->field[$i][$j+1] == 1) {
            $cellNeighbours[] =  $this->field[$i][$j+1];
        }
        //
        if(isset( $this->field[$i+1][$j-1]) && $this->field[$i+1][$j-1] == 1) {
            $cellNeighbours[] =  $this->field[$i+1][$j-1];
        }

        if(isset( $this->field[$i+1][$j]) && $this->field[$i+1][$j] == 1) {
            $cellNeighbours[] =  $this->field[$i+1][$j];
        }

        if(isset( $this->field[$i+1][$j+1]) && $this->field[$i+1][$j+1] == 1) {
            $cellNeighbours[] =  $this->field[$i+1][$j+1];
        }

        return $cellNeighbours;
    }

}

?>
