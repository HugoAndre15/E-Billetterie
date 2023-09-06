<?php
session_start();
include("../parts/connexion_bdd.php");
ini_set('display_errors', 'off');

if ($_SESSION['pseudo'] == "admin" and $_SESSION['mdp'] == "admin") {
	header("location: index_admin.php");
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
				<li><a href="../index.php">RETOUR SUR LE SITE</a></li>
			</ul>
		</nav>

		<div id="main">
			<h1>Connexion</h1>
			<p>Connectez-vous pour accéder à l'espace d'administration</p>

			<div class="formulaire">
				<form action="../parts/connexion_administration.php" method="post">
					<input type="text" name="pseudo" placeholder="Votre pseudo">
					<br>
					<input type="text" name="mdp" placeholder="Votre mot de passe">
					<br>
					<input type="submit" name="valider" value="Connexion">
				</form>
			</div>

		</div>


		<footer>
			<a href="../index.php">Retour sur le site</a>
		</footer>
	</div>
	</section>
</body>
</html>