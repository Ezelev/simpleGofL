<?php
require_once("gameoflife.php");
$n = 10;
$m = 10;
$pattern = "blinker";
$cyclesCount = 10;

if($n && $m && $pattern){
  $gol = new GameOfLife(true, $n, $m, $pattern);
//
  $start = microtime(true);
//
  $gol->gameOfLife($cyclesCount);
//
  ob_clean();

  $responseBody = $gol->getEvolutionHistory();
  // $time_elapsed_secs = microtime(true) - $start;
  // $response = ["status" => "1", "message" => "success", "evolution_exec_time"=> $time_elapsed_secs,"body" => $responseBody];
	//
 // echo json_encode($response);
 ob_start();
 while(TRUE){
	 foreach($responseBody as $step){
	  ob_clean();
	 	for($i=0;$i<10;$i++){

	 		for($j=0;$j<10;$j++){
	 				echo $step[$i][$j];

	 		}
	 		echo "\n";
	 	}
	 	usleep(500);
	 }
	 break;
 }

  die();
} else {
  $response = ["status"=> "0", "message"=> "Wrong parameters."];
  echo json_encode($response);
  die();
}


?>
