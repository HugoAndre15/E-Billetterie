<?php

$to = 'vic301202@gmail.com';
 

$subject = 'Developpez.com - Test Mail';
 

$boundary = md5(uniqid(microtime(), TRUE));
 
 
 
$headers = 'From: Adrien Pellegrini <mail@server.com>'."\r\n";
$headers .= 'Mime-Version: 1.0'."\r\n";
$headers .= 'Content-Type: multipart/mixed;boundary='.$boundary."\r\n";
$headers .= "\r\n";

$msg = 'Texte affiché par des clients mail ne supportant pas le type MIME.'."\r\n\r\n";

$msg .= '--'.$boundary."\r\n";
$msg .= 'Content-type: text/html; charset=utf-8'."\r\n\r\n";
$msg .= '
    <div style="padding:5px; width:600px; background-color:#E0EBF5; border:#000000 thin solid">
	<div>
        <img src="http://www.site.com/header.png" alt="Developpez.com - Newsletter" />
    </div>
    <div>
    	<h2 style="color:#274E9C; text-decoration:underline">Section :</h2>
    	<ul>
        	<li><a href="#devweb">Développement Web</a></li>
			<li><a href="#php">PHP</a></li>
        </ul>
    </div>
    <div>
    	<h2 id="devweb" style="color:#274E9C; text-decoration:underline">
            Développement Web :
        </h2>
    	<ul>
            <li>Comment personnaliser une fenêtre Apollo, par <em>Olivier Bugalotto</em></li>
            <li>Présentation du langage XHTML, par <em>Adrien Pellegrini</em></li>
            <li>Initiation au protocole SMTP et exemple d application en langage C, 
            	par <em>Benjamin Roux</em></li>
            <li>Modification inline de données en utilisant 
            	des classes Javascript, par <em>Olivier Lance</em></li>
        </ul>
    </div>
    <div>
    	<h2 id="php" style="color:#274E9C; text-decoration:underline">PHP :</h2>
    	<ul>
            <li>Débuter avec le Zend Framework en PHP (approche MVC), 
            	cours de Rob Allen traduit par <em>Guillaume Rossolini</em></li>
            <li>Simplifiez les accès à votre base de données avec EZPDO en PHP, 
            	par <em>Pierre-Nicolas Mougel</em></li>
            <li>Chiffrement et hash en PHP contre l attaque Man in the middle, 
            	par <em>Guillaume Affringue</em></li>
            <li>La sécurité dans les expressions régulières en PHP, 
            	par <em>Guillaume Rossolini</em></li>
        </ul>
    </div>
</div>'."\r\n";
 

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
 

mail($to, $subject, $msg, $headers);

?>