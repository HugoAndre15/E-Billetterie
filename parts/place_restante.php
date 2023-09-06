<?php
$place_reserve = 0;
$place_restante = 0;

$calcul_place = $bdd->query("SELECT * FROM `inscription` WHERE `actif` LIKE 1");
while ($reserver = $calcul_place->fetch()) {
	$place_reserve++;
}

$place_restante = 100 - $place_reserve;
$calcul_place->closeCursor();
?>