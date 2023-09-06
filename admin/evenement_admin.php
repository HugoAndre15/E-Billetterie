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
				<li><a href="index_admin.php">Accueil</a></li>
				<li><a href="reserver_admin.php">Reservation</a></li>
				<li><a href="#">Evenement</a></li>
			</ul>
		</nav>

		<div id="main">
			<h1>Changement de l'évenement</h1>
			<p>Changement l'evenement précedent par le prochain</p>



			<div class="formulaire">
				<form action="../parts/changement_evenement.php" method="post" onsubmit="return verification()">
					<input type="text" name="titre" placeholder="titre de l'evenement" autocomplete="off">
					<br>
					<input type="text" name="date" placeholder="date de l'evenement (ex: 12 juillet) " autocomplete="off">
					<br>
					<textarea type="text" name="description" placeholder="Description de l'evenement" autocomplete="off"></textarea>
					<br>
					<input type="submit" name="valider" value="Changer !">
				</form>
			</div>

		</div>


		<footer>
			<a href="../index.php">Retour sur le site</a>
		</footer>
	</div>
	</section>
	<script type="text/javascript">
		function verification(){
    	return confirm("Voulez vous vraiment faire ça ?");
		}
	</script>
</body>
</html>