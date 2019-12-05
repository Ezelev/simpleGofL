<?php
require_once("gameoflife.php");

if(isset($_GET["nSize"]) && !empty($_GET["nSize"])){
   $n = $_GET["nSize"];
}

if(isset($_GET["mSize"]) && !empty($_GET["mSize"])){
   $m = $_GET["mSize"];
}

if(isset($_GET["pattern"]) && !empty($_GET["pattern"])){
   $pattern = $_GET["pattern"];
}

if(isset($_GET["cyclesCount"]) && !empty($_GET["cyclesCount"])){
  $cyclesCount = $_GET["cyclesCount"];
} else {
  $cyclesCount = 10;
}

if($n && $m && $pattern){
  $gol = new GameOfLife(true, $n, $m, $pattern);
//
  $start = microtime(true);
//
  $gol->gameOfLife($cyclesCount);
//
  ob_clean();

  $responseBody = $gol->getEvolutionHistory();
  $time_elapsed_secs = microtime(true) - $start;
  $response = ["status" => "1", "message" => "success", "evolution_exec_time"=> $time_elapsed_secs,"body" => $responseBody];

  echo json_encode($response);
  die();
} else {
  $response = ["status"=> "0", "message"=> "Wrong parameters."];
  echo json_encode($response);
  die();
}


?>
