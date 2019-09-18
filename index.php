<?php
// require_once("gameoflife.php");

// $gol = new GameOfLife(true);
// $gol->gameOfLife(2);
// print_r($gol->getEvolutionHistory());
ob_clean();
$response = ["result" => "success"];
echo json_encode($response);
die();

?>
