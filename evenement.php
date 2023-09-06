<?php
session_start();
include("parts/connexion_bdd.php");
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>E-billeterie | évenements</title>
	<link rel="stylesheet" type="text/css" href="parts/style.css">
</head>
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
				<li><a href="#">Evenement</a></li>
			</ul>
		</nav>
		
		<div class="Evenement">
			

		</div>
		
		
		<div id="main">

			<div class="carte">
  				<img src="images/prochain-evenement.png" style="width:100%">
  				<div class="container">
    				<?php
                	$donne = $bdd->query("SELECT * FROM `evenement`");

                	while ($evenement = $donne->fetch()) {
                        echo "<p> Le " . htmlspecialchars($evenement["date"]) . "</p><h2>". htmlspecialchars($evenement["titre"]) . "</h2><p>"   . nl2br(htmlspecialchars($evenement["description"])) . "</p><p> ";
                	}
            		?>
            		
            		<a href="reservation.php" class="button">Reservez votre place</a>
            		<br>
            		<br>
  				</div>
			</div>

        </table>
		</div>

		<footer>
			<p>Tout droits réservé.</p>
		</footer>

	</div>
	</section>

	

</body>
</html>