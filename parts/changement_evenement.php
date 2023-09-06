<?php
session_start();
include("connexion_bdd.php");


// Vérification si on a toutes les infos
if (!empty($_POST["titre"]) and !empty($_POST["date"]) and !empty($_POST["description"])) {
	//oui: on les recoltent
	$titre = htmlspecialchars($_POST["titre"]);
	$date = htmlspecialchars($_POST["date"]);
	$description = htmlspecialchars($_POST["description"]);
}

else {
	//non: Page d'erreur 
	header("location: error.php");	
}

$bdd->exec("TRUNCATE `billeterie`.`evenement`");

$bdd->exec("INSERT INTO `evenement` (`ID`, `titre`, `date`, `description`) VALUES (NULL, '$titre', '$date', '$description');");
header("location: ../admin/index_admin.php");

?>