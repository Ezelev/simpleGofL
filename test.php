<?php
require_once("gameoflife.php");

$n = $_GET["nSize"];
$m = $_GET["mSize"];
$pattern = $_GET["pattern"];
$gol = new GameOfLife(true, $n, $m, $pattern);
// echo "<pre>";
// print_r($gol->baseField);
// echo "</pre>";
$gol->gameOfLife(100);
//print_r($gol->getEvolutionHistory());
ob_clean();
// echo "<pre>";
$response = $gol->getEvolutionHistory();
//print_r($response);
echo json_encode($response);
die();

?>
