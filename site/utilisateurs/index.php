<?php
//Cette fonction doit être appelée avant tout code html
session_start();

//On donne ensuite un titre à la page, puis on appelle notre fichier debut.php
$titre = "Index du forum";
include("includes/identifiantdb.php");
include("includes/debut.php");
include("includes/menu.php");

echo'<p>Vous êtes ici : </i><a href ="./index.php">Index du forum</a></p>';
?>
<a href="connexion.php">Connexion</a><br>
<a href="register.php">Inscription</a><br>
<a href="deconnexion.php">Déconnexion</a>