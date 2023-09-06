<?php
session_start();
include("../parts/connexion_bdd.php");

if ($_SESSION['pseudo'] != "admin" or $_SESSION['mdp'] != "admin") {
	header("location: ../parts/error.php");
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>E-billeterie - Administrateur</title>
	<link rel="stylesheet" type="text/css" href="../parts/style.css">
</head>
<body>
	<section class="section">
    <div id="wrapper">
		<header>
			<img src="../images/logo.png" class="center" alt="logo du site">
			<h1 class="center">E-billeterie - administration</h1>
		</header>

		<nav>
			<ul>
				<li><a href="#">Accueil</a></li>
				<li><a href="reserver_admin.php">Reservation</a></li>
				<li><a href="evenement_admin.php">Evenement</a></li>
			</ul>
		</nav>

		<div id="main">
			<h1>Bienvenue sur l'espace d'administration</h1>
			<p>Utilisez le menu ci dessus pour effectuer les différentes actions possible !</p>

			<p>La page d'administration s'avère trés utile pour vous, vous pouvez vous en servir pour:</p>
			<ul>
				<li>Remplacer l'ancien évenement par le nouveau</li>
				<li>Remettre les inscriptions à 0</li>
			</ul>

		</div>


		<footer>
			<a href="../index.php">Retour sur le site</a>
			<br>
			<a href="../parts/deconnexion_admin.php">Deconnexion</a>
		</footer>
	</div>
	</section>
</body>
</html>