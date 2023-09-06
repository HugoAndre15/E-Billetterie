<?php
include('phpqrcode/qrlib.php'); //On inclut la librairie au projet
$lien='http://localhost/E-billeterie/index.php'; 
QRcode::png($lien, 'image-qrcode.png'); // On crée notre QR Code
?>