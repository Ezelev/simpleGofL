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
  // echo "<pre>";
  // print_r($gol->baseField);
  // echo "</pre>";
  $gol->gameOfLife($cyclesCount);
  //print_r($gol->getEvolutionHistory());
  ob_clean();
  // echo "<pre>";
  $responseBody = $gol->getEvolutionHistory();
  $response = ["status" => "1", "message" => "success", "body" => $responseBody];
  //print_r($response);
  echo json_encode($response);
  die();
} else {
  $response = ["status"=> "0", "message"=> "Wrong parameters."];
  echo json_encode($response);
  die();
}


?>
