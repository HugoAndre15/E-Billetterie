<?php
session_start();
include("parts/connexion_bdd.php");
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>E-billeterie</title>
	<link rel="stylesheet" type="text/css" href="parts/style.css"></head>
<body>
	<section class="section">
    <div id="wrapper">
		<header>
			<img src="images/logo.png" class="center" alt="logo du site">
			<h1 class="center">E-billeterie</h1>
		</header>

		<nav>
			<ul>
				<li><a href="index.php">Accueil</a></li>
				<li><a href="reservation.php">Achat</a></li>
			</ul>
		</nav>

		<div id="main">
			<h2>Confirmer votre venue</h2>

			<p>Vous allez recevoir un mail vous demandant de confirmer votre venue, faite-le le plus vite possible pour être sur d'avoir une place</p>

			<p class="important">Touts nos évenements débute à 21h00 !</p>



		</div>

	</div>
	</section>

</body>
</html>