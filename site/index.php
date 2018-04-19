<?php
include("include/class.php");

$page = new Page("THE Jeux Video DB","Acceuil");
//var_dump($page);

include("include/header.php");
?>
<main>

	<h2>Création ou modification d'un éléments</h2>
	<ul>
		<li><a href="formulaires/jeu.php">Jeu</a></li>
		<li><a href="formulaires/support.php">Support</a></li>
		<li><a href="formulaires/dlc.php">DLC</a></li>
		<li><a href="formulaires/editeur.php">Editeur</a></li>
	</ul>

	<h2>Listes des éléments</h2>
	<ul>
		<li><a href="vues/liste_jeux.php">Jeux</a></li>
		<li><a href="vues/liste_supports.php">Supports</a></li>
		<li><a href="vues/liste_dlc.php">DLC</a></li>
		<li><a href="vues/liste_editeurs.php">Editeurs</a></li>
	</ul>
</main>

<?php
include("include/footer.php");
?>
</body>
</html>
