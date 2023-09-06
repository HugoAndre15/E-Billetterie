<?php
session_start();
include("../parts/connexion_bdd.php");

unset($_SESSION['pseudo']);
unset($_SESSION['mdp']);

header("location: ../index.php");
?>