<?php
session_start();

$_SESSION['pseudo'] = " ";
$_SESSION['mdp'] = " ";

// Vérification si on a toutes les infos
if (!empty($_POST["pseudo"]) and !empty($_POST["mdp"])) {
	//oui: on les recoltent
	$_SESSION['pseudo'] = htmlspecialchars($_POST["pseudo"]);
	$_SESSION['mdp'] = htmlspecialchars($_POST["mdp"]);
	header("location: ../admin/index_admin.php");
}

else {
	//non: Page d'erreur 
	header("location: error.php");	
}

?>