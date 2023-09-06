<?php
session_start();
include("connexion_bdd.php");
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>E-billeterie</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<section class="section">
    <div id="wrapper">
		<header>
			<img src="../images/logo.png" class="center" alt="logo du site">
			<h1 class="center">E-billeterie</h1>
		</header>

		<nav>
			<ul>
				<li><a href="../index.php">Accueil</a></li>
				<li><a href="../evenement.php">Evenement</a></li>
			</ul>
		</nav>

		<div id="main">

			<h1>Oups il y a eu un petit soucis.... </h1>
			<p> <a href="../index.php">Appuyez ici pour retourner a l'acceuil</a> sinon vous pouvez <a href="../reservation.php"> retourner à votre réservation</a></p>

			<h3>Exemple de problemes courants:</h3>
			<ul>
				<li>Vous êtes déjà inscrit.</li>
				<li>Un champs du formulaire est mal renseigné.</li>
				<li>Il n'y a plus de place.</li>
				<li>Le mail ne peut être envoyé.</li>
				<li>Le mot de passe ou l'utilisateur est incorrect</li>
			</ul>		

		</div>

	</div>
	</section>

</body>
</html>