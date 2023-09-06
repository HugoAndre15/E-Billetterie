<?php
session_start();
include("parts/connexion_bdd.php");

include ("parts/place_restante.php");

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>E-billeterie</title>
	<link rel="stylesheet" type="text/css" href="parts/style.css">
</head>
<body>
	<section class="section">
    <div id="wrapper">
		<header>
			<img src="images/logo.png" class="center" alt="logo du site">
			<h1 class="center">E-billeterie | réservation</h1>

		</header>

		<nav>
			<ul>
				<li><a href="index.php">Accueil</a></li>
				<li><a href="#">Evenement</a></li>
			</ul>
		</nav>

		<div id="main">
			<p>Obtenir une place est facile: remplisser ce petit formulaire puis un mail vous sera envoyez avec votre billet qu'il vous suffira de présenter.</p>

			<p class="important"> Il reste actuellement <?php echo $place_restante; ?> places pour le spectacle.</p>
			
		
		<?php 
		if($place_restante > 0){
			echo '
			<!-- Formulaire d\'inscription au spectacle -->
			<div class="formulaire">
				<form action="parts/envoi_reservation.php" method="post">
					<input type="text" name="mail" placeholder="Votre mail" required>
					<br>
					<input type="text" name="prenom" placeholder="Votre prenom" required>
					<br>
					<input type="text" name="nom" placeholder="Votre nom" required>
					<br>
					<input type="text" name="age" placeholder="Votre age" required>
					<br>
					<p>Votre genre</p>
					<INPUT type= "radio" name="genre" value="Homme"> Homme
					<INPUT type= "radio" name="genre" value="Femme"> Femme
					<INPUT type= "radio" checked= "checked" name="genre" value="Autre"> Autre
					<br><br><br><br>
					<input type="submit" name="valider" value="S\'inscrire !">
				</form>
			</div>
		</div>';
		}
		else
		{echo '<p>Il n\'y a plus de places pour ce spectacle, désolé...</p>';}
		?>

		<footer>
			<p>Tout droits réservés</p>
		</footer>

	</div>
	</section>

</body>
</html>