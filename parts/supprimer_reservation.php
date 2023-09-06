<?php
session_start();
include("connexion_bdd.php");

$bdd->exec("TRUNCATE `billeterie`.`inscription`");
header("location: ../admin/index_admin.php");
?>