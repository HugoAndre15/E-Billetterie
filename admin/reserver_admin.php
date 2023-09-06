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
                <li><a href="evenement_admin.php">Evenement</a></li>
            </ul>
        </nav>

        <div id="main">
            <p>Voici la liste des personnes qui ont confirmer leur venue:</p>

            <table class="table is-bordered is-hoverable">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Numéro billet</th>
                        <th>Présent</th>
                    </tr>
                </thead>

                <tbody>
                    
                    <?php
                        $donne = $bdd->query("SELECT * FROM `inscription` WHERE `actif` LIKE 1");

                        while ($reserver = $donne->fetch()) {
                                echo"<tr><td>". htmlspecialchars($reserver["nom"]) . "</td> <td>" . htmlspecialchars($reserver["prenom"]) . "</td> <td>" . htmlspecialchars($reserver["cle"]) . '</td> <td><input type="checkbox" name="presence" value="present"></td></tr>';
                        }
                    ?>
                </tbody>
            </table>
            <br>
            <a href="../parts/supprimer_reservation.php" onclick="return verification()" class="button">Supprimer toutes les réservations</a>
            <br>
            <br>
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

