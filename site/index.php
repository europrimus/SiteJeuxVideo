<?php
require ("include/config.php");
// renvoi un objet PDO $db

$page = new Page("Acceuil");

include(SITE["installDir"]."include/header.php");
?>
<main class="container-fluid">

	<h2>Création ou modification d'un élément</h2>
	<ul>
		<li><a href="jeux/creer.php">Jeu</a></li>
		<li><a href="supports/creer.php">Support</a></li>
		<li><a href="dlc/creer.php">DLC</a></li>
		<li><a href="editeurs/creer.php">Editeur</a></li>
	</ul>

	<h2>Liste des élément (Modification, suppression et fiche individuelle)</h2>
	<ul>
		<li><a href="jeux/modifier.php">Jeu</a></li>
		<li><a href="supports/modifier.php">Support</a></li>
		<li><a href="dlc/modifier.php">DLC</a></li>
		<li><a href="editeurs/modifier.php">Editeur</a></li>
	</ul>

	<h2>Liste des élément</h2>
	<ul>
		<li><a href="jeux/index.php">Jeux</a></li>
		<li><a href="supports/index.php">Supports</a></li>
		<li><a href="dlc/index.php">DLC</a></li>
		<li><a href="editeurs/index.php">Editeurs</a></li>
	</ul>
</main>

<?php
include(SITE["installDir"]."include/footer.php");
?>
