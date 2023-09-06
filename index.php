<?php
session_start();
include("parts/connexion_bdd.php");
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
			<h1 class="center">E-billeterie</h1>
		</header>

		<nav>
			<ul>
				<li><a href="#">Accueil</a></li>
				<li><a href="evenement.php">Evenement</a></li>
			</ul>
		</nav>
		<div class="banniere">
			<div class="text-banniere">  
				<h1>Les meilleurs évenements</h1>
    			<p>Avec des places 100% gratuites</p>
    			<a href="evenement.php" class="button">Voir le prochain evenement</a>
    		</div>
		</div>

		<div id="main">
			<h2>Des images de nos anciens évenements: </h2>
			
			<div id="grille">
  				<figure>
  					<img src="images/grille1.jpg" alt="rose-red-wine">
  					<figcaption>Mini-festival electro</figcaption>
  				</figure>

  				<figure>
    				<img src="images/grille2.jpg" alt>
    				<figcaption>Concert John Lama</figcaption>
  				</figure>
  				<figure>
    				<img src="images/grille3.jpg" alt>
    				<figcaption>Opera de Lindsey</figcaption>
  				</figure>
  				<figure>
    				<img src="images/grille4.jpg" alt>
    				<figcaption>Dj Snake</figcaption>
  				</figure>
			</div>


		</div>
		<br><br>
		<p>Nous trouver:</p>
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d552.10584843381!2d2.3809196105379367!3d48.833934723424846!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e6723c33541a2d%3A0xdcbbcc7244853498!2sBateau%20Melody%20Blues!5e0!3m2!1sfr!2sfr!4v1580719433633!5m2!1sfr!2sfr" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>

		<footer>
			<p>Tout droits réservé.</p>
			<a href="admin/connexion_admin.php">admin</a>
		</footer>

	</div>
	</section>

	

</body>
</html>