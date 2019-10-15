<?php
require_once("gameoflife.php");

$pattern = $_GET["pattern"];
$gol = new GameOfLife(true, $pattern);
$gol->gameOfLife(30);
//print_r($gol->getEvolutionHistory());
ob_clean();
// echo "<pre>";
$response = $gol->getEvolutionHistory();
//print_r($response);
echo json_encode($response);
die();

?>
