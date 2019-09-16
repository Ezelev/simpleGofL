<?php

class GameOfLife {

    public $field;
    public $evolvingTable;
    public $evolveCount = 0;

    public function __construct( $test = false, $initialSeed = []) {

        $this->field = $initialSeed;   
        $this->evolvingTable = $initialSeed;

        if($test) {

            $initialSeed = [
                [0,0,0,0,0],
                [0,0,1,0,0],
                [0,0,1,0,0],
                [0,0,1,0,0],
                [0,0,0,0,0]
                ];

            $this->field = $initialSeed;
            $this->evolvingTable = $initialSeed;
        }

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
            echo "<br>";
        }
    }


    public function gameOfLife($cycles) {
        $this->printField();
        for($i = 0; $i<= $cycles; $i++) {
            echo "<br>";
            $this->evolve();
            echo "Evolves number: " . $this->evolveCount;
            echo "<br>";
            $this->printEvolveResult();
        }
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
