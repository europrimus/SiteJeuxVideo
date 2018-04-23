<?php
// charge la configuration et renvoi un objet PDO $db
require ("../include/config.php");
$page = new Page("Informations sur un DLC");

// charge le début de la page <html> à </header>
include(SITE["installDir"]."include/header.php");
?>
<main class="container-fluid">
	<h3>Informations</h3>
	<ul>
		<li>Nom : Nom du DLC</li>
		<li>Jeu : Nom du jeu</li>
		<li>Support : Nom du support</li>
		<li>Editeur : Nom de l'éditeur</li>
		<li>Date de sortie : Date de sortie</li>
	</ul>
	<h3>Description</h3>
	<p>Description du DLC</p>
</main>

<?php
// charge la fin de la page de <footer> à </html>
include(SITE["installDir"]."include/footer.php");
?>
