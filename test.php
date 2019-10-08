<?php
require_once("gameoflife.php");

$gol = new GameOfLife(true);
$gol->gameOfLife(5);
//print_r($gol->getEvolutionHistory());
ob_clean();
// echo "<pre>";
$response = $gol->getEvolutionHistory();
//print_r($response);
echo json_encode($response);
die();

?>
