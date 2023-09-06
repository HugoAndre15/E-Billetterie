<?php
session_start();
include("connexion_bdd.php");


// Vérification si on a toutes les infos
if (!empty($_POST["mail"]) and !empty($_POST["nom"])) {
	//oui: on les recoltent
	$mail = htmlspecialchars($_POST["mail"]);
	$nom = htmlspecialchars($_POST["nom"]);
	$cle = cle_aleatoire();
	$prenom = htmlspecialchars($_POST["prenom"]);
	$age = htmlspecialchars($_POST["age"]);
	$genre = htmlspecialchars($_POST["genre"]);
}

else {
	//non: Page d'erreur 
	header("location: error.php");	
}

//Vérif si la personne n'est pas deja inscrite (nom)
$verif_inscription = $bdd->prepare("SELECT * FROM inscription WHERE nom like :nom ");
if($verif_inscription->execute(array(':nom' => $nom)) && $row = $verif_inscription->fetch())
{
	//Vérif si la personne n'est pas deja inscrite (prenom)
	$verif_inscription = $bdd->prepare("SELECT * FROM inscription WHERE prenom like :prenom ");
	if($verif_inscription->execute(array(':prenom' => $prenom)) && $row = $verif_inscription->fetch())	
	{	
		// deja inscrite: on l'accepte pas
		header("location: error.php");	
	}
	
	else{
		envoi_mail();
	}
	
}

else{
	envoi_mail();

}


function envoi_mail(){
	if (!empty($_POST["mail"]) and !empty($_POST["nom"])) {
	//oui: on les recoltent
	$mail = htmlspecialchars($_POST["mail"]);
	$nom = htmlspecialchars($_POST["nom"]);
	$cle = cle_aleatoire();
	$prenom = htmlspecialchars($_POST["prenom"]);
	$age = htmlspecialchars($_POST["age"]);
	$genre = htmlspecialchars($_POST["genre"]);
}

	include("connexion_bdd.php");
	
	//Pas encore inscrite: on l'accepte
	$bdd->exec("INSERT INTO `inscription` (`ID`, `mail`, `nom`, `cle`, `actif`,`age`,`prenom`,`genre`) VALUES (NULL, '$mail', '$nom', '$cle', '0','$age','$prenom','$genre');");
	// envoi du mail


$destinataire = $mail;
$sujet = "Confirmation de réservation" ;
$header="MIME-Version: 1.0\r\n";
$header.='From:"E-billeterie"<ticketebilleterie@gmail.com>'."\n";
$header.='Content-Type:text/html; charset="uft-8"'."\n";
$header.='Content-Transfer-Encoding: 8bit';

$message = '
<html>
	<body>
	<div>
		<h1>Votre réservation</h1>
	 
		<p>Pour activer votre compte, veuillez cliquer sur le lien ci-dessous
		ou copier/coller dans votre navigateur Internet.

		<br>

		http://127.0.0.1/E-billeterie/activation.php?nom='.urlencode($nom).'&prenom='.urlencode($prenom).'&cle='.urlencode($cle).'&mail='.urlencode($mail) .'

		<br>

		<br>
		---------------
		<br>
		Ceci est un mail automatique, Merci de ne pas y répondre.
		</p>
	</div>
	</body>
</html>';

	mail($destinataire, $sujet, $message, $header);

	header('location: ../confirmation.php');
}



function cle_aleatoire($length=10){
    $chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $cle_random = '';
    for($i=0; $i<$length; $i++){
        $cle_random .= $chars[rand(0, strlen($chars)-1)]; 
    }
    return $cle_random;
}


?>