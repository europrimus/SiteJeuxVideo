<?php
require ("../include/config.php");
$page = new Page("Informations sur un jeu");
include(SITE["installDir"]."include/header.php");
?>
<main>
	<h2>Fiche Nom Jeu</h2>
	<h3>Informations</h3>
	<ul>
		<li>Nom : Nom du jeu</li>
		<li>Support : Nom du support</li>
		<li>Editeur : Nom de l'éditeur</li>
		<li>Date de sortie : Date de sortie</li>
	</ul>
	<h3>Description</h3>
	<p>Description du DLC</p>
</main>

<?php
include(SITE["installDir"]."include/footer.php");
?>
