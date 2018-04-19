<?php
require ("include/config.php");
require ("include/class.php");

$page = new Page("Acceuil");
//var_dump($page);

include("include/header.php");
?>
<main>

	<h2>Création ou modification d'un élément</h2>
	<ul>
		<li><a href="jeux/creer.php">Jeu</a></li>
		<li><a href="supports/creer.php">Support</a></li>
		<li><a href="dlc/creer.php">DLC</a></li>
		<li><a href="editeurs/creer.php">Editeur</a></li>
	</ul>

	<h2>Modification d'un élément</h2>
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
include("include/footer.php");
?>
</body>
</html>
