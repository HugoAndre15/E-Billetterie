<?php
session_start();
include("parts/connexion_bdd.php");


$nom = $_GET['nom'];
$cle = $_GET['cle'];
$mail = $_GET['mail'];
if (!empty($mail) && !empty($nom) && !empty($cle)) {

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
				<li><a href="evenement.php">Evenement</a></li>
			</ul>
		</nav>
		
		<?php
 
// Récupération de la clé correspondant au $nom dans la base de données
$stmt = $bdd->prepare("SELECT cle,actif FROM inscription WHERE nom like :nom ");
if($stmt->execute(array(':nom' => $nom)) && $row = $stmt->fetch())
  {
    $clebdd = $row['cle'];    // Récupération de la clé
    $actif = $row['actif']; // $actif contiendra alors 0 ou 1
  }

else{
  $statut = "Oups, il y a eu un soucis de communication....";
}
 
 
// On teste la valeur de la variable $actif récupérée dans la BDD
if($actif == '1') // Si la place est déjà active on prévient
  {
     $statut = "Votre place est déjà reserve !";
  }
else // Si ce n'est pas le cas on passe aux comparaisons
  {
     if($cle == $clebdd) // On compare nos deux clés    
       {
          // Si elles correspondent on active la place     
          $statut = "Votre place a bien été activé ! Vous allez recevoir un mail qui vous servira de billet en cas de doute sur votre identité.
          <br> Vous pouvez retourner sur le site";
 
          // La requête qui va passer notre champ actif de 0 à 1
          $stmt = $bdd->prepare("UPDATE inscription SET actif = 1 WHERE nom like :nom ");
          $stmt->bindParam(':nom', $nom);
          $stmt->execute();
		  
		  //
		  // Mail
		  // 
		  envoi_mail();
		 
       }

     else { // si les deux clé sont différentes il y a une erreur 
        
          $statut = "Erreur ! Votre place ne peut être activé...";
       }
  }
  echo $statut;
}

else{
  echo "Le lien n'est pas valable";
}






function envoi_mail(){
	 $nom = $_GET['nom'];
	 $prenom = $_GET['prenom'];
	 $cle = $_GET['cle'];
	 $mail = $_GET['mail'];
	 $sujet = "Votre E-billet";
	 
	 include('phpqrcode/qrlib.php'); //On inclut la librairie au projet
	 $lien='http://127.0.0.1/E-billeterie/activation.php?nom='.urlencode($nom).'&cle='.urlencode($cle).'&mail='.urlencode($mail) .''; 
	 QRcode::png($lien, 'image-qrcode.png'); // On crée notre QR Code
	 
	 
	 
	 
	
	 $boundary = md5(uniqid(microtime(), TRUE));
 
 
 
		  $headers = 'From: E-billeterie <mail@server.com>'."\r\n";
		  $headers .= 'Mime-Version: 1.0'."\r\n";
		  $headers .= 'Content-Type: multipart/mixed;boundary='.$boundary."\r\n";
		  $headers .= "\r\n";

          //on écrit le message pour envoyer le ticket par mail
          $msg = 'Probleme avec votre mail.'."\r\n\r\n";

		$msg .= '--'.$boundary."\r\n";
		$msg .= 'Content-type: text/html; charset=utf-8'."\r\n\r\n";
		$msg .= '
			
			<div>
				<h2 style="color:#274E9C; text-decoration:underline">Votre Billet !</h2>
			</div>
		<div style="padding:5px; width:600px; background-color:#E0EBF5; border:#000000 thin solid">
			
			<ul>
				<li>Nom: '. $nom .'</li>
				<li>Prénom: '. $prenom . '</li>
				<li>Mail: '. $mail .'</li>
				<li>Cle: '. $cle .'</li>

			</ul>
		</div>
		<p>Tous nos évènements se déroulent à bord du Melody Blues<br>1 Port de Bercy Aval, 75012 Paris</p>

		'."\r\n";
 

		$file_name = 'image-qrcode.png';
		if (file_exists($file_name))
		{
			$file_type = filetype($file_name);
			$file_size = filesize($file_name);
 
			$handle = fopen($file_name, 'r') or die('File '.$file_name.'can t be open');
			$content = fread($handle, $file_size);
			$content = chunk_split(base64_encode($content));
			$f = fclose($handle);
 
			$msg .= '--'.$boundary."\r\n";
			$msg .= 'Content-type:'.$file_type.';name='.$file_name."\r\n";
			$msg .= 'Content-transfer-encoding:base64'."\r\n\r\n";
			$msg .= $content."\r\n";
		}		
 

 

		$msg .= '--'.$boundary."\r\n";
				

        
  
        // on envoie le mail  
        mail($mail, $sujet, $msg, $headers);
}

?>


		<footer>
			<p>Tout droits réservés</p>
		</footer>

	</div>
	</section>

</body>
</html>